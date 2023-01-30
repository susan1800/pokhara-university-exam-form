<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
use Illuminate\Support\Facades\Storage;
use App\Models\Auth;
use App\Models\User;
use Hash;

class RegisterController extends BaseController
{
    
    public function register(Request $request){
        

        $this->validate($request, [
            'name'      =>  'required|max:191',
            'email'    =>  'required|email',
            'phone'    =>  'required|digits:10|unique:users,phone,',
            'password' =>  'required|min:6',

        ]);
        try{
        $resultemail = $this->checkEmail($request->email);
        if($resultemail == 1){
        $roll_no = $this->getRollNo($request->email);
        if($roll_no == false){
             return $this->responseRedirect('signup', 'Email format is invalid <br> <your roll number><your first name>@cosmoscollege.edu.np !' ,'success',false, false);
        }

        $useremailresult = $this->checkUser("email",$request->email);
        if($useremailresult == 1)
        {
            return $this->responseRedirect('signin', 'Account already registered ! Please login' ,'success',false, false);

        }
        $userrollresult = $this->checkUser("roll_no",$roll_no);
        if($userrollresult == 1)
        {
            return $this->responseRedirect('signin', 'Account already registered ! Please login' ,'success',false, false);

        }



        $auth = Auth::where('title' , '=' , 'user')->get();
        $params = $request->except('_token');

        $params['auth_id'] = $auth[0]['id'];
        $params['password'] = Hash::make($params['password']);

        $user =new User($params);
        $user['auth_id']=$auth[0]['id'];
        $user['roll_no'] = $roll_no;
        $user->save();

        if($user){
            return $this->responseRedirect('signin', 'Register  successfully ! Please login' ,'success',false, false);

        }
        else{
            return $this->responseRedirectBack('Something wrong Please try again !', 'error', true, true);
        }
    }
    else{
        return $this->responseRedirectBack('Only College email is valid (@cosmoscollege.edu.np)', 'error', true, true);
    }
    }catch (ModelNotFoundException $e) {

        return $this->responseRedirectBack('Error occurred while Register.', 'error', true, true);
    }

    }
    private function getRollNo($email){
        
        $roll = str_split($email);
        $roll_no = "";
        for($i=0;$i<6;$i++){
            $roll_no = $roll_no.$roll[$i];
        }
       
        if (!is_numeric($roll_no)){
             return false;
        }
        return $roll_no;
    }


    private function checkEmail($email){
        $pieces = explode("@", $email);
        if($pieces['1'] == "cosmoscollege.edu.np"){
            return 1;
        }
        else{
            return 0;
        }
    }
    private function checkUser($column , $data){
        $userroll =User::where($column , '=' , $data)->get();
        if(sizeof($userroll) > 0){
            return 1;

        }
        else{
            return 0;
        }
    }



    //php artisan key:generate
}
