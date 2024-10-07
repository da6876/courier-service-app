<?php

namespace App\Http\Controllers\delivery;

use App\Http\Controllers\Controller;
use App\Models\delivery\Deliverys;
use App\Models\store\DeliveryType;
use App\Models\store\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class DeliverysController extends Controller
{
    public function index()
    {
        return view('merchant.delivery.deliverys');
    }

    public function create()
    {
        return view('merchant.delivery.add_deliverys');
    }

    public function store(Request $request)
    {
        try {
            if ($request['id'] == "") {

                $validator = Validator::make($request->all(), [
                    'store_id' => 'required',
                    'prod_type_id' => 'required',
                    'recipient_phone' => 'required',
                    'recipient_name' => 'required',
                    'recipient_address' => 'required',
                    'div_id' => 'required',
                    'dis_id' => 'required',
                    'out_id' => 'required',
                    'thn_id' => 'required',
                    'delivery_type' => 'required',
                    'total_weight' => 'required',
                    'quantity' => 'required',
                    'amount_to_collect' => 'required',
                    'price' => 'required',
                    'item_description' => 'required',
                ]);

                if ($validator->fails()) {
                    return response()->json(['statusCode' => 204, 'statusMsg' => 'Validation Error.', 'errors' => $validator->errors()]);
                }
                $trackingNumber = $this->generateTrackingNumber();
                Deliverys::create([
                    'uid' => Str::uuid(),
                    'tracking_number' => $trackingNumber,
                    'store_id' => $request->store_id,
                    'prod_type_id' => $request->prod_type_id,
                    'merchant_order_id' => $request->merchant_order_id,
                    'recipient_phone' => $request->recipient_phone,
                    'recipient_sec_phone' => $request->recipient_sec_phone,
                    'recipient_name' => $request->recipient_name,
                    'recipient_address' => $request->recipient_address,
                    'div_id' => $request->div_id,
                    'dis_id' => $request->dis_id,
                    'out_id' => $request->out_id,
                    'thn_id' => $request->thn_id,
                    'special_remark' => $request->special_remark,
                    'delivery_type' => $request->delivery_type,
                    'total_weight' => $request->total_weight,
                    'quantity' => $request->quantity,
                    'amount_to_collect' => $request->amount_to_collect,
                    'price' => $request->price,
                    'item_description' => $request->item_description,
                    'status' => 'Pending',
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
                $rowData = Deliverys::where('uid', $id)->first();

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
            $rowData = Deliverys::where('uid', $id)->firstOrFail();
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
            $rowData = Deliverys::where('uid', $id)->firstOrFail();
            return $rowData;
        } catch (\Exception $e) {

            return response()->json([
                "statusCode" => 400,
                "statusMsg" => $e->getMessage()
            ]);
        }
    }

    public function getProType()
    {
        try {
            $rowData = ProductType::where('status', 'A')->get();
            return $rowData;
        } catch (\Exception $e) {

            return response()->json([
                "statusCode" => 400,
                "statusMsg" => $e->getMessage()
            ]);
        }
    }
    public function getDeliveryType()
    {
        try {
            $rowData = DeliveryType::where('status', 'A')->get();
            return $rowData;
        } catch (\Exception $e) {

            return response()->json([
                "statusCode" => 400,
                "statusMsg" => $e->getMessage()
            ]);
        }
    }

    public function getDeliveryTotals()
    {
        $userId = auth()->user()->id; // Get the authenticated user's ID

        $totals = Deliverys::selectRaw("
            SUM(CASE WHEN status = 'Received' THEN amount_to_collect ELSE 0 END) AS total_collected,
            SUM(amount_to_collect) AS total_receivable,
            SUM(CASE WHEN status = 'Received' THEN price ELSE 0 END) AS total_received,
            SUM(amount_to_collect - price) AS total_fee
        ")
            ->where('create_by', $userId) // Filter by the authenticated user's ID
            ->where('status', '!=', 'Deleted') // Exclude records marked as deleted
            ->first();

        return response()->json([
            'total_collected' => $totals->total_collected ?? 0,
            'total_receivable' => $totals->total_receivable ?? 0,
            'total_received' => $totals->total_received ?? 0,
            'total_fee' => $totals->total_fee ?? 0,
        ]);
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

    private function generateTrackingNumber()
    {
        // Example logic for generating the tracking number
        $prefix = 'DB'; // You can customize this prefix
        $datePart = date('ymd'); // Gets the current date in yymmdd format
        $randomString = strtoupper(Str::random(8)); // Generates a random string of 8 characters

        return $prefix . $datePart . $randomString; // Combine to form the tracking number
    }
}

