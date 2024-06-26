<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
use Illuminate\Support\Facades\Storage;
use App\Models\PaymentStatus;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Auth;
use Mail;
use Hash;
class VerificationController extends BaseController
{
    public function sendotp($email){


        try{
            $user = User::where('email' , $email)->first();
            if(!$user){
                return $this->responseRedirectBack('Account not found. Please try with valid email.', 'error', true, true);
            }

        $otp=mt_rand(100000, 999999);
        $details = [
            'title' => 'Cosmos College of Management and Technology ',
            'body' => "your otp-code is",
            'head'=>$otp
        ];
        \Mail::to($email)->send(new \App\Mail\mailotp($details));
        $hashcode =Crypt::encryptString($otp);
        $hashmail = Crypt::encryptString($email);
        return redirect()->route('verifyotp',['makeotp' => $hashcode , 'email'=> $hashmail]);
    }catch (ModelNotFoundException $e) {

        return $this->responseRedirectBack('Error occurred while send otp.', 'error', true, true);
    }
    }



    public function sendotpforgotpassword($email){


        try{
            $user = User::where('email' , $email)->first();
            if(!$user){
                return $this->responseRedirectBack('Account not found. Please try with valid email.', 'error', true, true);
            }

        $otp=mt_rand(100000, 999999);
        $details = [
            'title' => 'Cosmos College of Management and Technology ',
            'body' => "your otp-code is",
            'head'=>$otp
        ];
        \Mail::to($email)->send(new \App\Mail\mailotp($details));
        $hashcode =Crypt::encryptString($otp);
        $hashmail = Crypt::encryptString($email);
        return redirect()->route('forgotpassword.verifyotp',['makeotp' => $hashcode , 'email'=> $hashmail]);
    }catch (ModelNotFoundException $e) {

        return $this->responseRedirectBack('Error occurred while send otp.', 'error', true, true);
    }
    }


    public function resendotp($email){


        try{



            $email = Crypt::decryptString($email);

            $user = User::where('email' , $email)->first();
            if(!$user){
                return $this->responseRedirectBack('Account not found. Please try with valid email.', 'error', true, true);
            }

        $otp=mt_rand(100000, 999999);
        $details = [
            'title' => 'Cosmos College of Management and Technology ',
            'body' => "your otp-code is",
            'head'=>$otp
        ];
        \Mail::to($email)->send(new \App\Mail\mailotp($details));
        $hashcode =Crypt::encryptString($otp);
        $hashmail = Crypt::encryptString($email);
        return redirect()->route('verifyotp',['makeotp' => $hashcode , 'email'=> $hashmail]);
    }catch (ModelNotFoundException $e) {

        return $this->responseRedirectBack('Error occurred while send otp.', 'error', true, true);
    }
    }


    public function checkotp(Request $request){
        $this->validate($request, [
            'email'    =>  'required',
            'otp' =>  'required',
            'inputotp' =>  'required',
        ]);
        try{
        if($request->inputotp == Crypt::decryptString($request->otp)){

                return $this->responseRedirect('initialsetup','Please change your password !', 'success', false, false);


        }
        else{
            return redirect()->route('verifyotp',['makeotp' => $request->otp , 'email'=> $request->email])->with('error','wrong otp code please enter valid otp code!');
        }
    }catch (ModelNotFoundException $e) {

        return $this->responseRedirectBack('Error occurred in OTP.', 'error', true, true);
    }
    }




    public function checkotpforgotpassord(Request $request){
        $this->validate($request, [
            'email'    =>  'required',
            'otp' =>  'required',
            'inputotp' =>  'required',
        ]);
        try{
        if($request->inputotp == Crypt::decryptString($request->otp)){
              $email = $request->email;
        return view('login.forgotpassword.changepassword' , compact('email'));

        }
        else{
            return $this->responseRedirectBack('Otp not matched. please enter valid otp.', 'error', true, true);
        }
    }catch (ModelNotFoundException $e) {

        return $this->responseRedirectBack('Error occurred in OTP.', 'error', true, true);
    }
    }




    public function checkrole($auth_id){
        $auth = Auth::where('id' , '=' , $auth_id)->get();
                if($auth[0]->title=="admin"){
                    // echo "user is admin";
                    return true;
                }
                else{
                    // echo "user is user";
                    return false;
                }
    }
    private function checkPaymentStatus($roll_no){
        $status = User::where('roll_no' , $roll_no)->get();
        if($status[0]->status == 1){
            return true;
        }
        else{
            return false;
        }
    }
}
