<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Exports\UsersPaymentImport;
use App\Models\PaymentStatus;
use App\Imports\UsersPaymentImport;
use Maatwebsite\Excel\Facades\Excel;

class PaymentController extends Controller
{
    public function showPaymentMethod(){
        return view('payment.showpaymentmethod');
    }


    public function uploadPaymentStatus(Request $request)
    {
        // dd($request->fileInput);
            // Excel::import(new UsersPaymentImport, $request->fileInput);
           $result = Excel::import(new UsersPaymentImport,request()->file('fileInput'));
            
            if($result){
                return true;
            }else{
                return false;
            }








    //         $file = Input::file('fileInput');
    // $ext = $file->getClientOriginalExtension();
    // $fileName = md5(time()).".$ext";

    // $destinationPath = "uploads/".date('Y').'/'.date('m').'/';
    // $file->move($destinationPath, $fileName);
    // $path = $file->getRealPath();
    // return Response::json(["success"=>true,"uploaded"=>true, "url"=>$path]);

    }



    public function updatePaymentStatus(){
        $result = PaymentStatus::where('approve_form', '>=' ,0)->update(['approve_form' => 0]);
        if($result){
            return 1;
        }
        else{
            return 0;
        }
    }
}
