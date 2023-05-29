<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\BaseController;

class InitialSetupController extends BaseController
{
    public function index(){
        return view('frontend.initialsetup');
    }
    public function changepassword(Request $request){
        $this->validate($request, [
            'password' => 'required',
            'confirmpassword' => 'required|same:password',
        ]);
        try {
        $user_id = $request->session()->get('sessioninitialcosmos');
        $user = User::find($user_id);
        $user['password'] = Hash::make($request->password);
        $user->save();

        return $this->responseRedirect('signin','Password changed successfully! Please Login.', 'success', false, false);
    }catch (QueryException $exception) {
        return $this->responseRedirectBack('Something wrong please try again.', 'error', true, true)->withInput($request->input());
    }
    }
}
