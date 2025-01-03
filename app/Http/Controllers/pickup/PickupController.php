<?php

namespace App\Http\Controllers\pickup;

use App\Http\Controllers\Controller;
use App\Models\delivery\Deliverys;
use App\Models\delivery\DeliveryStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PickupController extends Controller
{

    public function index()
    {
        return view('pickup.pickup_info');
    }

    public function getDeliveryStatus()
    {
        $delivery = DeliveryStatus::where('status', '!=', 'Deleted')->get();
        return response()->json($delivery);
    }

    public function getData(Request $request)
    {
        if ($request->ajax()) {
            // Using raw SQL to calculate totals with JOIN
            $totals = DB::select("
            SELECT
                SUM(CASE WHEN ds.name = 'Received' THEN d.amount_to_collect ELSE 0 END) AS total_collected,
                SUM(d.amount_to_collect) AS total_receivable,
                SUM(CASE WHEN ds.name = 'Received' THEN d.price ELSE 0 END) AS total_received,
                SUM(d.amount_to_collect - d.price) AS total_fee,
                COUNT(CASE WHEN ds.name = 'Received' THEN 1 END) AS received_count,
                COUNT(CASE WHEN ds.name = 'Pending' THEN 1 END) AS pending_count,
                COUNT(*) AS total_count
            FROM delivery d
            INNER JOIN delivery_status ds ON d.status = ds.id
            WHERE d.status != 'Deleted'
        ");

            $totals = collect($totals)->first(); // Convert the result to a collection and take the first element

            // Build the base query with a raw SQL JOIN for fetching records
            $query = "
            SELECT d.tracking_number, d.recipient_name, d.recipient_phone, d.recipient_address, d.price, ds.name AS status
            FROM delivery d
            INNER JOIN delivery_status ds ON d.status = ds.id
            WHERE d.status != 'Deleted'
        ";

            // Add name filter if applicable
            if ($request->has('name') && $request->input('name') != '') {
                $name = $request->input('name');
                $query .= " AND (d.recipient_phone LIKE '%$name%' OR d.recipient_name LIKE '%$name%' OR d.recipient_address LIKE '%$name%')";
            }

            // Add deliveryStatus filter if applicable
            if ($request->has('deliveryStatus') && $request->input('deliveryStatus') != '') {
                $deliveryStatus = $request->input('deliveryStatus');
                $query .= " AND ds.name LIKE '%$deliveryStatus%'";
            }

            // Get the total count of filtered records
            $totalData = DB::select("SELECT COUNT(*) AS count FROM delivery d INNER JOIN delivery_status ds ON d.status = ds.id WHERE d.status != 'Deleted'");

            // Paginate the query using OFFSET and LIMIT for DataTables
            $start = $request->input('start');
            $length = $request->input('length');
            $query .= " LIMIT $start, $length";

            // Execute the query to get the filtered data
            $filteredData = DB::select($query);

            // Return the response in the required DataTables format, including total counts
            return response()->json([
                'draw' => intval($request->input('draw')),
                'recordsTotal' => $totalData[0]->count ?? 0,
                'recordsFiltered' => $totalData[0]->count ?? 0, // You can change this if needed for filtered count
                'data' => $filteredData,
                'totals' => [
                    'received_count' => $totals->received_count ?? 0,
                    'pending_count' => $totals->pending_count ?? 0,
                    'total_count' => $totals->total_count ?? 0,
                ],
            ]);
        }

        // If not an AJAX request, return an error response
        return response()->json(['error' => 'Invalid request'], 400);
    }


}
