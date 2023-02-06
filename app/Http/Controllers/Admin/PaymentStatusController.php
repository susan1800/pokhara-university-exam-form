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
        $this->setPageTitle('payment status', 'payment status');
        $this->setFlashMessage('update sucessfully', 'success');
        $notification = KeyValue::where('key','notification_count')->first();
        return view('/admin/paymentstatus/index' , compact('payments' , 'notification'));
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


}
