<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
use Illuminate\Support\Facades\Storage;
use Session;

class LogoutController extends BaseController
{
    public function userlogout(){

        session()->forget('testuserlogin');
        return $this->responseRedirect('signin' , 'logout successfully.');
        // return redirect()->route('signin');
    }
    public function adminlogout(){

        session()->forget('testadminlogin');
        return $this->responseRedirect('signin' , 'logout successfully.');
        // return redirect()->route('signin');
    }
}
