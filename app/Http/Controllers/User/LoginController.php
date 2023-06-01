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
use App\Models\KeyValue;
use App\Models\Auth;
use Hash;

class LoginController extends BaseController
{
    public function login(Request $request){

        $this->validate($request, [
            'email'    =>  'required',
            'password' =>  'required',
        ]);
        try {
        $user =User::where('email' , '=' , $request->email)->first();


        if($user == null){
            return $this->responseRedirectBack('Email not found Please register first.', 'error', true, true);
        }


        else{



            $current_year = KeyValue::where('key','current_year')->first();
            $split= str_split($current_year->value);
           $checkroll = ($split[2].$split[3]-8).'0000';
        //    dd($checkroll);
           if($user->roll_no < $checkroll){
            return $this->responseRedirectBack("Sorry, You can't login to the system!", 'error', true, true);
           }




// dd($user);
            if((string)$user->roll_no === $user->password){

                if($request->password == $user->password){
                    $request->session()->put('sessioninitialcosmos',$user->id);
                    return $this->responseRedirect('initialsetup','Please change your password !', 'success', false, false);
                }else{
                    return $this->responseRedirectBack('Password not matched , Please enter valid password.', 'error', true, true);
                }
            }




            $returncheckpassword = $this->checkpassword($request->password , $user->password);

            if($returncheckpassword == false){
                return $this->responseRedirectBack('Password not matched , Please enter valid password.', 'error', true, true);
            }


               $returncheckrole = $this->checkrole($user->auth_id);
            //    dd($returncheckrole);


               if($returncheckrole == "admin"){
                $request->session()->put('testadminlogin','yes');
                $request->session()->put('sessionadminidcosmos',$user->id);
                $request->session()->put('testexamlogin','no');
                return redirect()->route('admin.dashboard');


               }
               elseif($returncheckrole == "exam"){
                $request->session()->put('testexamlogin','yes');
                $request->session()->put('testadminlogin','no');
                $request->session()->put('sessionadminidcosmos',$user->id);
                return redirect()->route('admin.dashboard');
               }
               else{


                // $returnUser = $this->checkUser($user[0]->roll_no);
                if($user->approve_form == "1"){

                    $request->session()->put('testuserlogin','yes');
                    $request->session()->put('sessionuseridcosmos',$user->id);
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



    private function checkrole($auth_id){
        $auth = Auth::find($auth_id);
                if($auth->title=="admin"){

                    return "admin";
                }
                elseif($auth->title=="exam"){

                    return "exam";
                }
                else{

                    return "student";
                }
    }

}

