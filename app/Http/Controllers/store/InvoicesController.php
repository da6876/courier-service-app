<?php

namespace App\Http\Controllers\store;

use App\Http\Controllers\Controller;
use App\Models\delivery\Deliverys;
use App\Models\store\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class InvoicesController extends Controller
{
    public function index()
    {
        return view('merchant.invoices');
    }

    public function store(Request $request)
    {
        try {
            if ($request['id'] == "") {

                $validator = Validator::make($request->all(), [
                    'store_name' => 'required',
                    'address' => 'required',
                    'contact_phone' => 'required',
                    'div_id' => 'required',
                    'dis_id' => 'required',
                    'out_id' => 'required',
                    'thn_id' => 'required',
                ]);

                if ($validator->fails()) {
                    return response()->json(['statusCode' => 204, 'statusMsg' => 'Validation Error.', 'errors' => $validator->errors()]);
                }

                Store::create([
                    'uid' => Str::uuid(),
                    'user_id' => auth()->user()->id,
                    'email' => $request->email,
                    'store_name' => $request->store_name,
                    'address' => $request->address,
                    'contact_phone' => $request->contact_phone,
                    'secondary_phone' => $request->secondary_phone,
                    'div_id' => $request->div_id,
                    'dis_id' => $request->dis_id,
                    'out_id' => $request->out_id,
                    'thn_id' => $request->thn_id,
                    'status' => 'A',
                    'create_by' => auth()->user()->id,
                    'update_by' => '0',
                    'create_date' => $this->getCurrentDateTime(),
                    'update_date' => '0'
                ]);

                return response()->json([
                    "statusCode" => 200,
                    "statusMsg" => "Data Added Successfully"
                ]);
            } else {
                $id = $request['id'];
                $rowData = Store::where('uid', $id)->first();

                if (!$rowData) {
                    return response()->json([
                        'statusCode' => 404,
                        'statusMsg' => 'Data not found.',
                    ]);
                }

                $validator = Validator::make($request->all(), [
                    'store_name' => 'required',
                    'address' => 'required',
                    'contact_phone' => 'required',
                    'div_id' => 'required',
                    'dis_id' => 'required',
                    'out_id' => 'required',
                    'thn_id' => 'required',
                ]);

                if ($validator->fails()) {
                    return json_encode(array('statusCode' => 204, 'statusMsg' => 'Validation Error.', 'errors' => $validator->errors()));
                }

                $rowData->update([
                    'email' => $request->email,
                    'store_name' => $request->store_name,
                    'address' => $request->address,
                    'contact_phone' => $request->contact_phone,
                    'secondary_phone' => $request->secondary_phone,
                    'div_id' => $request->div_id,
                    'dis_id' => $request->dis_id,
                    'out_id' => $request->out_id,
                    'thn_id' => $request->thn_id,
                    'status' => 'A',
                    'update_by' => auth()->user()->id,
                    'update_date' => $this->getCurrentDateTime()
                ]);

                return response()->json([
                    "statusCode" => 200,
                    "statusMsg" => "Data Updated Successfully"
                ]);

            }

        } catch (\Exception $e) {
            return response()->json([
                "statusCode" => 400,
                "statusMsg" => $e->getMessage()
            ]);
        }
    }

    public function destroy($id)
    {
        try {
            $rowData = Store::where('uid', $id)->firstOrFail();
            $rowData->update([
                'status' => "Deleted",
                'update_by' => auth()->user()->id,
                'update_date' => $this->getCurrentDateTime()
            ]);

            return response()->json([
                "statusCode" => 200
            ]);
        } catch (\Exception $e) {

            return json_encode(array(
                "statusCode" => 400,
                "statusMsg" => $e->getMessage()
            ));;
        }
    }

    public function show($id)
    {
        try {
            $rowData = Store::where('uid', $id)->firstOrFail();
            return $rowData;
        } catch (\Exception $e) {

            return response()->json([
                "statusCode" => 400,
                "statusMsg" => $e->getMessage()
            ]);
        }
    }
    public function getInvoice(Request $request)
    {
        $trackingNumber = $request->get('tracking_number');

        // Fetch the data from the Deliverys model based on the tracking number
        $data = Deliverys::where('tracking_number', $trackingNumber)->first();

        if ($data) {
            return response()->json($data);
        }

        return response()->json(['error' => 'Invoice not found.'], 404);
    }

    public function getData(Request $request)
    {
        if ($request->ajax()) {
            $userId = auth()->user()->id; // Get the authenticated user's ID

            // Calculate totals
            $totals = Deliverys::selectRaw("
                SUM(CASE WHEN status = 'Received' THEN amount_to_collect ELSE 0 END) AS total_collected,
                SUM(amount_to_collect) AS total_receivable,
                SUM(CASE WHEN status = 'Received' THEN price ELSE 0 END) AS total_received,
                SUM(amount_to_collect - price) AS total_fee
            ")
                ->where('create_by', $userId) // Filter by the authenticated user's ID
                ->where('status', '!=', 'Deleted') // Exclude records marked as deleted
                ->first();

            // Prepare the main query
            $query = Deliverys::query()
                ->where('status', '=', 'Received')
                ->where('status', '!=', 'Deleted')
                ->where('create_by', $userId);

            // Apply custom filters
            if ($request->has('name') && $request->input('name') != '') {
                $name = $request->input('name');
                $query->where(function($q) use ($name) {
                    $q->where('recipient_phone', 'like', '%' . $name . '%')
                        ->orWhere('recipient_name', 'like', '%' . $name . '%')
                        ->orWhere('recipient_address', 'like', '%' . $name . '%');
                });
            }

            $totalData = $query->count();
            $filteredData = $query->skip($request->input('start'))
                ->take($request->input('length'))
                ->get();

            return response()->json([
                'draw' => intval($request->input('draw')),
                'recordsTotal' => $totalData,
                'recordsFiltered' => $totalData,
                'data' => $filteredData,
                'totals' => [
                    'total_collected' => $totals->total_collected ?? 0,
                    'total_receivable' => $totals->total_receivable ?? 0,
                    'total_received' => $totals->total_received ?? 0,
                    'total_fee' => $totals->total_fee ?? 0,
                ],
            ]);
        }

        return response()->json(['error' => 'Invalid request'], 400);
    }

}
