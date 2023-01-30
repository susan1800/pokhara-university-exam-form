<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\User;
use Hash;

class ForgotPasswordController extends BaseController
{
    public function forgotPasswordEmail(){
        return view('login.forgotpassword.email');
    }


    public function forgotPasswordSendOtp(Request $request){
        return redirect()->route('sendotp.forgotpassword' , $request->email);

    }

    public function forgotPasswordVerifyOtp(){
        return view('login.forgotpassword.otpverify');
    }
    public function forgotPasswordChange(Request $request){
        $email = Crypt::decryptString($request->email);
        $data = User::where('email' , $email)->first();
        $result = User::find($data->id);
        $result['password'] = Hash::make($request['password']);
        $result->save();
        // return redirect()->route('signin')->with('password change successfully' , 'success');
        return $this->responseRedirect('signin', 'Password changed, please login !' ,'success',false, false);
    }
}
