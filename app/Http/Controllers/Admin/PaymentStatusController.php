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
        try{

        $current_year = KeyValue::where('key','current_year')->first();


        $expand = str_split((int)$current_year->value-4);

        $roll = "$expand[2]"."$expand[3]"."0000";
        $expand1 = str_split((int)$current_year->value-5);
        $rollarchitecture = "$expand1[2]"."$expand1[3]"."0800";

        $roll1 = "$expand1[2]"."$expand1[3]"."0700";

        // dd($roll);
        // PaymentStatus::where('roll_no', '<', $roll)->update(['approve_form' => 1]);;

        $students = PaymentStatus::where('roll_no', '>', $roll)->update(['approve_form' => 0]);
        $students = PaymentStatus::where('roll_no', '>', $roll1)->where('roll_no', '<', $rollarchitecture)->update(['approve_form' => 0]);

            return 1;

    }catch (QueryException $exception) {
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
