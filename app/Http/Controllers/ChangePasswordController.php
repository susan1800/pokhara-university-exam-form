<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Models\User;
use Hash;

class ChangePasswordController extends BaseController
{
    public function index(){
        return view('admin.changepassword.changepassword');
    }
    public function changePassword(Request $request){
        $this->validate($request, [
            'oldpassword'    =>  'required',
            'password' =>  'required',
            'confirmpassword' =>'required',
        ]);

        $user_id = session()->get('sessionadminidcosmos');

        $user = User::find($user_id);
        
        if(Hash::check($request->oldpassword, $user->password)){

            $user->password =  Hash::make($request['password']);
            $user->save();
            return $this->responseRedirect('admin.dashboard', 'Password changed successfully !' ,'success',false, false);

        }else{
            
            return $this->responseRedirectBack('Old Password not matched, Please try again !', 'error', true, true);
        }

    }


    public function userindex(){
        return view('frontend.changepassword.changepassword');
    }
    public function userchangePassword(Request $request){
        $this->validate($request, [
            'oldpassword'    =>  'required',
            'password' =>  'required',
            'confirmpassword' =>'required',
        ]);

        $user_id = session()->get('sessionuseridcosmos');

        $user = User::find($user_id);
      
        
        if(Hash::check($request->oldpassword, $user->password)){

            $user->password =  Hash::make($request['password']);
            $user->save();
            return $this->responseRedirect('user', 'Password changed successfully !' ,'success',false, false);

        }else{
            
            return $this->responseRedirectBack('Old Password not matched, Please try again !', 'error', true, true);
        }

    }
}
