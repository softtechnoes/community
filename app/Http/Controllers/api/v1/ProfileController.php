<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\ResidenceProfile;
use App\models\NativeProfile;
use App\Models\CompanyProfile;

class ProfileController extends Controller
{
    
    public function EditUser(Request $request) {
        // dd('check');
        $profile_edit = User::with('CompanyProfile', 'ResidenceProfile', 'Native', 'Categories')->where('id', $request->id)->first();
        
           if(!empty($profile_edit)) {
               return response()->json(['profile_edit' => $profile_edit, 'status' => 200])->setStatusCode(200);
            }
            return response()->json(['error' => 'No Data Found', 'status' => 400])->setStatusCode(400);
    }

    public function updateprofile(Request $request , $id)
    {
        if ($request->hasFile('image')) {
            $validator = Validator::make($request->all(), [
                'image' => 'image|mimes:jpg,png',
            ]);
            if($validator->fails()) {
                return response()->json(['error' => 'This format is not supported only jpg and png!']);
            }

            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('users/images/', $filename);
            User::where('id', $id)->update([
                'image' => $filename
            ]);
        }

        User::where('id', $id)->update([
            'fname' => $request['fname'],
            'mname' => $request['mname'],
            'lname' => $request['nname'],
            'phone' => $request['phone'],
            'secondary_email' => $request['secondary_email'],
            'gender' => $request['gender'],
            'dob' => $request['dob'],
            'date_of_anniversary' => $request['date_of_anniversary'],
        ]);

        if ($request->email) {
            $validator = Validator::make($request->all(), [
                'email' => ['string', 'email', 'max:255', 'unique:users'],
            ]);

            if($validator->fails()) {
                return response()->json(['error' => 'Email already exit!']);
            }
            User::where('id', $id)->update([
                'email' => $request['email'],
                'email_verified_at' => NULL,
            ]);
        }

        ResidenceProfile::where('user_id', $id)->update([
                'address' => $request['address'],
                'area' => $request['area'],
                'city' => $request['city'],
                'pincode' => $request['pincode'],
                'primary_phone' => $request['primary_phone'],
                'secondary_phone' => $request['secondary_phone'],
                'country' => $request['country'],
        ]);

        CompanyProfile::where('user_id', $id)->update([
            'company_name' =>  $request['company_name'],
            'company_address' =>  $request['company_address'],
            'office_area' =>  $request['office_area'],
            'company_city' =>  $request['company_city'],
            'company_state' =>  $request['company_state'],
            'company_country' =>  $request['company_country'],
            'office_phone' =>  $request['office_phone'],
            'company_email' =>  $request['company_email'],
            'company_website' =>  $request['company_website'],
        ]);

        if ($request->hasFile('company_image')) {
            $validator = Validator::make($request->all(), [
                'company_image' => 'image|mimes:jpg,png',
            ]);
            if($validator->fails()) {
                return response()->json(['error' => 'This format is not supported only jpg and png!']);
            }

            $file = $request->file('company_image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('users/company-image/', $filename);
            CompanyProfile::where('user_id', $id)->update([
                'company_image' => $filename,
            ]);
        }

        NativeProfile::where('user_id', $id)->update([
            'native_address' => $request['native_address'],
            'native_pincode' => $request['native_pincode'],
            'committe_member' => $request['committe_member'],
            'committe_role' => $request['committe_role'],
            'committe_order' => $request['committe_order'],
        ]);

        try {
            $users = user::with('CompanyProfile', 'ResidenceProfile', 'Native')->get();
            return  response()->json(['message' => 'Profile has been Updated Successfully!', 'status' => 200, 'users' => $users]);
        } catch (\Throwable $th) {
            return  response()->json(['message' => 'The profile update could not be completed!', 'status' => 400]);
            
        }
    }
}
