<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class LoginOtpController extends Controller
{

    public function check() {
        return 'check';
    }
    public function Login(Request $request)
    {
        $user = User::where('phone', $request->phone)->first();
        if(!empty($user)) {
            // $otp_generate =  mt_rand(100000,999999);
            $otp_generate =  1234;

            if(!empty($otp_generate)) {
                User::where('phone', $request->phone)->update([
                    'otp' => $otp_generate,
                ]);
                return response()->json(['otp' => $otp_generate, 'status' => 200])->setStatusCode(200);
            }
        }else {
            return response()->json(['status' => 400, 'message' => 'Mobile number is not registered']);
        }
    }

    public function otpVerified(Request $request) {

        $user = User::with('CompanyProfile', 'ResidenceProfile', 'Native', 'Categories')->where(['otp' => $request->otp, 'phone' =>$request->phone])->first();
        if(!empty($user)) {
            
            return response()->json(['user' =>  $user, 'message' => 'Welcome back', 'status' => 200])->setStatusCode(200);
        }else {
            return response()->json(['status' => 400, 'message' => 'Wrong OTP']);
      
        }

    }
}
