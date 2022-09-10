<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function forgotPasswordEmail(){
        return view('login.forgotpassword.email');
    }


    public function forgotPasswordSendOtp(Request $request){
        return redirect()->route('sendotp.forgotpassword' , $request->email);

    }
}
