<?php

namespace App\Http\Controllers\merchant;

use App\Http\Controllers\Controller;
use App\Mail\RegistrationMail;
use App\Models\merchant\MerchantsInfo;
use App\Models\UserConfig\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class MerchantInfoController extends Controller
{
    public function index()
    {
        return view('merchant.merchant');
    }

    public function regPost(Request $request)
    {
        try {
            $messages = [
                'owner_email.unique' => 'The email address has already been Used. Please use a different email or login using this email.',
                'owner_email.required' => 'The email address is required.',
                'owner_email.email' => 'The email address must be a valid email format.',
            ];
            $validator = Validator::make($request->all(), [
                'owner_name' => 'required',
                'owner_phone' => 'required',
                'owner_email' => 'required|email|unique:merchants,owner_email',
                'company_name' => 'required',
                'password' => 'required',
            ],$messages);

            if ($validator->fails()) {
                return response()->json(['statusCode' => 204, 'statusMsg' => 'Validation Error.', 'errors' => $validator->errors()]);
            }

            MerchantsInfo::create([
                'uid' => Str::uuid(),
                'owner_name' => $request->owner_name,
                'owner_phone' => $request->owner_phone,
                'owner_email' => $request->owner_email,
                'company_name' => $request->company_name,
                'status' => 'A',
                'create_by' => $request->owner_email,
                'update_by' => '0',
                'create_date' => $this->getCurrentDateTime(),
                'update_date' => '0'
            ]);

            User::create([
                'uid' => Str::uuid(),
                'role_id' =>'4',
                'name' =>$request->owner_name,
                'email' =>$request->owner_email,
                'password' =>Hash::make($request->password),
                'status' => 'A',
                'user_name' =>$this->generateCustomString(),
                'longitude' =>$request->longitude ?: '0.0',
                'latitude' =>$request->latitude?: '0.0',
                'ip' =>$request->ip ?: '0.0',
                'mac' =>$request->mac ?: '0.0',
                'last_login' =>$request->last_login ?: '0.0',
                'create_by' => $request->owner_email,
                'update_by' => '0.0',
                'create_date' => $this->getCurrentDateTime(),
                'update_date' => '0.0',
                'token' => Str::random(60)
            ]);
            Mail::to($request->owner_email)->send(new RegistrationMail($request->owner_name));

            return response()->json([
                "statusCode" => 200,
            ]);

        } catch (\Exception $e) {
            return response()->json([
                "statusCode" => 400,
                "statusMsg" => $e->getMessage()
            ]);
        }
    }

    public function store(Request $request)
    {
        try {
            if ($request['id'] == "") {

                $validator = Validator::make($request->all(), [
                    'owner_name' => 'required',
                    'owner_phone' => 'required',
                    'owner_email' => 'required',
                    'company_name' => 'required',
                    'company_phone' => 'required',
                    'company_email' => 'required',
                    'address' => 'required',
                    'status' => 'required',
                ]);

                if ($validator->fails()) {
                    return response()->json(['statusCode' => 204, 'statusMsg' => 'Validation Error.', 'errors' => $validator->errors()]);
                }

                MerchantsInfo::create([
                    'uid' => Str::uuid(),
                    'owner_name' => $request->owner_name,
                    'owner_phone' => $request->owner_phone,
                    'owner_email' => $request->owner_email,
                    'company_name' => $request->company_name,
                    'company_phone' => $request->company_phone,
                    'company_email' => $request->company_email,
                    'address' => $request->address,
                    'status' => $request->status,
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
                $rowData = MerchantsInfo::where('id', $id)->first();

                if (!$rowData) {
                    return response()->json([
                        'statusCode' => 404,
                        'statusMsg' => 'Data not found.',
                    ]);
                }

                $validator = Validator::make($request->all(), [
                    'owner_name' => 'required',
                    'owner_phone' => 'required',
                    'owner_email' => 'required',
                    'company_name' => 'required',
                    'company_phone' => 'required',
                    'company_email' => 'required',
                    'address' => 'required',
                    'status' => 'required',
                ]);

                if ($validator->fails()) {
                    return json_encode(array('statusCode' => 204, 'statusMsg' => 'Validation Error.', 'errors' => $validator->errors()));
                }

                $rowData->update([
                    'owner_name' => $request->owner_name,
                    'owner_phone' => $request->owner_phone,
                    'owner_email' => $request->owner_email,
                    'company_name' => $request->company_name,
                    'company_phone' => $request->company_phone,
                    'company_email' => $request->company_email,
                    'address' => $request->address,
                    'status' => $request->status,
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
            $rowData = MerchantsInfo::where('uid', $id)->firstOrFail();
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
            $rowData = MerchantsInfo::where('id', $id)->firstOrFail();
            return $rowData;
        } catch (\Exception $e) {

            return response()->json([
                "statusCode" => 400,
                "statusMsg" => $e->getMessage()
            ]);
        }
    }

    public function getData(Request $request)
    {
        if ($request->ajax()) {
            $query = MerchantsInfo::query()->where('status', '!=', 'Deleted');
            // Apply custom filters
            if ($request->has('name') && $request->input('name') != '') {
                $query->where('name', 'like', '%' . $request->input('name') . '%');
            }

            $totalData = $query->count();
            $filteredData = $query->skip($request->input('start'))
                ->take($request->input('length'))
                ->get();

            return response()->json([
                'draw' => intval($request->input('draw')),
                'recordsTotal' => $totalData,
                'recordsFiltered' => $totalData,
                'data' => $filteredData
            ]);
        }

        return response()->json(['error' => 'Invalid request'], 400);
    }
}
