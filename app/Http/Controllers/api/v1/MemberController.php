<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Addmember;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class MemberController extends Controller
{
    
    public function index() 
    {
        $member_list =  Addmember::all();
        if(!empty($member_list)) {
            return response()->json(['status' => 200,'member_list' => $member_list]);
        }else {
            return response()->json(['status' => 400, 'messaage' => 'Data Not Found']);
        }
    }
    public function add_family_member(Request $request, $id) {

        $validator = Validator::make($request->all(), [
            'member_name' => 'required|string',
            'member_phone' => 'required|max:13',
            'member_address' => 'required|max:50',
            'member_gender' => 'required|not_in:0',
            'member_relation' => 'required|not_in:0',
            'member_pincode' => 'required|numeric|min:6',
            'member_city' => 'required',
        ]);

        if ($validator->fails()) {
           return response()->json(['status' => 400,'message' =>  $validator->errors()->first()]);
       }else {
            $addmember =  new Addmember();
            $addmember->user_id =  $id;
            $addmember->member_name =  $request->member_name;
            $addmember->member_phone =  $request->member_phone;
            $addmember->member_address =  $request->member_address;
            $addmember->member_gender =  $request->member_gender;
            $addmember->member_relation =  $request->member_relation;
            $addmember->member_pincode =  $request->member_pincode;
            $addmember->member_city =  $request->member_city;

           try {
               $addmember->save();
               return response()->json(['status' => 200, 'massege' =>'Family member added successfully']);
           } catch (\Throwable $th) {
            return response()->json(['status' => 400, 'massege' =>'Server Problem']);

           }

       }

    }

    public function family_member_detail($id) {
        $member =  Addmember::where('user_id', $id)->get();
        if(!empty($member)) {
            return response()->json(['status' => 200,'member' =>  $member]);
        }
    }

    public  function edit_family_member_profile(Request $request , $id)
    {

        $validator = Validator::make($request->all(), [
            'member_name' => 'required|string',
            'member_phone' => 'required|max:13',
            'member_address' => 'required|max:50',
            'member_gender' => 'required|not_in:0',
            'member_relation' => 'required|not_in:0',
            'member_pincode' => 'required|numeric|min:6',
            'member_city' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 400,'message' =>  $validator->errors()->first()]);
        }else {
            Addmember::where('id', $id)->update([
                'member_name' =>  $request['member_name'],
                'member_phone' =>  $request['member_phone'],
                'member_address' =>  $request['member_address'],
                'member_gender' =>  $request['member_gender'],
                'member_relation' =>  $request['member_relation'],
                'member_pincode' =>  $request['member_pincode'],
                'member_city' =>  $request['member_city'],
            ]);

            try {
                $memberUpdate =  Addmember::where('id', $id)->get();
                return response()->json(['status' => 200, 'massege' =>'Family member Profile Update successfully', 'memberUpdate' => $memberUpdate]);
                } catch (\Throwable $th) {
                return response()->json(['status' => 400, 'massege' =>'Server Problem']);

            }
        }
    }
}
