<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Models\PaymentStatus;
use App\Models\User;
use App\Models\KeyValue;
class PaymentStatusController extends BaseController
{
    public function index(){
        $payments = PaymentStatus::latest()->paginate(50);
        $this->setPageTitle('Student Status', 'Student Status');
        $open = KeyValue::where('key','open')->first();
        $notification = KeyValue::where('key','notification_count')->first();
        return view('/admin/paymentstatus/index' , compact('payments' , 'notification' ,'open'));
    }

    public function changeFormStatus(Request $request){
        $status = PaymentStatus::find($request->rollno);
        if($status->approve_form == '0'){
        $status['approve_form']='1';
        }
        else{
            $status['approve_form']='0';
        }
        $result = $status->save();
        if($result){
        return 1;
        }else{
            return 0;
        }
    }

    public function editStudent(Request $request){

        $this->validate($request, [
            'name'      =>  'required',
            'roll_no'   => 'required',
            'registration_number' => 'required',
            'id'         =>'required',
        ]);
        try{


        $update = PaymentStatus::find($request->id);

        $update->name = $request->name;
        $update->roll_no = $request->roll_no;
        $update->registration_number = $request->registration_number;
        $update->save();
        $payments = PaymentStatus::latest()->paginate(50);
        $this->setPageTitle('Student Status', 'Student Status');
        $this->setFlashMessage('success', 'success');

        $notification = KeyValue::where('key','notification_count')->first();
        // return view('/admin/paymentstatus/index' , compact('payments' , 'notification'))->with('success','success');

        return redirect()->route('admin.paymentstatus.index')->with('success' ,'Data updated Successfully !');
        }catch (QueryException $exception) {
            return redirect()->route('admin.paymentstatus.index')->with('error' ,'Something wrong please try again !');
        }
    }


    public function updatePaymentStatus(){



        $result = PaymentStatus::where('approve_form', '>=' ,0)->where('level', '>=' ,0)->update(['approve_form' => 0]);
        if($result){
            return 1;
        }
        else{
            return 0;
        }
    }


    public function opencloseform(){
        try{
        $value = KeyValue::where('key','open')->first();
        $update = KeyValue::find($value->id);
        if($value->value == "0"){
            $update->value = 1;
        }else{
            $update->value = 0;
        }
        $update->save();
        return 1;
    }catch (QueryException $exception) {
        return 0;
    }
    }




}
