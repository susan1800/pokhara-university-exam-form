<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Auth;
use App\Models\PaymentStatus;
use Hash;

class LoginController extends BaseController
{
    public function login(Request $request){

        $this->validate($request, [
            'email'    =>  'required',
            'password' =>  'required',
        ]);
        try {
        $user =User::where('email' , '=' , $request->email)->get();
        
        if(sizeof($user) < 1){
            return $this->responseRedirectBack('Email not found Please refister first.', 'error', true, true);
        }
        

        else{

            $returncheckpassword = $this->checkpassword($request->password , $user[0]->password);

            if($returncheckpassword == false){
                return $this->responseRedirectBack('Password not matched , Please enter valid password.', 'error', true, true);
            }


               $returbverify =  $this->checkverify($user[0]->email_verified_at , $user[0]->email);
               if($returbverify == false){
                return redirect()->route('sendotp' , $user[0]->email);
                // return $this->responseRedirect('sendotp' , '', 'success', true, true);
               }


               $returncheckrole = $this->checkrole($user[0]->auth_id);

               if($returncheckrole == true){
                $request->session()->put('testadminlogin','yes');
                $request->session()->put('sessionadminidcosmos',$user[0]->id);
                return redirect()->route('admin.dashboard');
                

               }
               else{


                $returnPaymentStatus = $this->checkPaymentStatus($user[0]->roll_no);
                if($returnPaymentStatus == true){

                    $request->session()->put('testuserlogin','yes');
                    $request->session()->put('sessionuseridcosmos',$user[0]->id);
                    return redirect()->route('user');

                }
                else{
                    return $this->responseRedirectBack('Payment Not Cleared , Please Contact To the Administrator.', 'error', true, true);
                }

            }
        }

        }catch (ModelNotFoundException $e) {

            return $this->responseRedirectBack('Error occurred while login.', 'error', true, true);
        }
    }


    private function checkpassword($inputpassword , $password){
        if(Hash::check($inputpassword, $password)){

            return true;
        }
        else{
            return false;
        }
    }



 


    private function checkverify($verified_at , $email){
        if($verified_at == null){

            return false;
        }
        else{
            return true;
        }
    }




    private function checkrole($auth_id){
        $auth = Auth::where('id' , '=' , $auth_id)->get();
                if($auth[0]->title=="admin"){

                    return true;
                }
                else{

                    return false;
                }
    }

    private function checkPaymentStatus($roll_no){
        $status = PaymentStatus::where('roll_no' , $roll_no)->get();
        if($status[0]->approve_form == 1){
            return true;
        }
        else{
            return false;
        }
    }




}

