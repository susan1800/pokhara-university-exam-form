<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Exports\UsersPaymentImport;
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
            Excel::import(new UsersPaymentImport,request()->file('fileInput'));

            return redirect()->route('admin.paymentstatus.index')->with('success', 'User Imported Successfully');








    //         $file = Input::file('fileInput');
    // $ext = $file->getClientOriginalExtension();
    // $fileName = md5(time()).".$ext";

    // $destinationPath = "uploads/".date('Y').'/'.date('m').'/';
    // $file->move($destinationPath, $fileName);
    // $path = $file->getRealPath();
    // return Response::json(["success"=>true,"uploaded"=>true, "url"=>$path]);

    }
}
