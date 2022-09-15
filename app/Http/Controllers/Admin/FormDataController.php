<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Models\FormData;
use Mail;
use App\Models\NotificationCount;
use App\Models\Notification;
class FormDataController extends BaseController
{
    public function index(){
        $formDatas = FormData::latest()->get();
        $this->setPageTitle('view form', 'view form');
        $notification = NotificationCount::first();
        return view('/admin/viewformdatas/index' , compact('formDatas' , 'notification'));
    }
    public function changeFormStatus(Request $request){
        $status = FormData::find($request->rollno);
        if($status->approve != 1){
            $status->approve = 1;
            $status->save();
            $mailStatus = $this->mail($status->user->email);
            if($mailStatus == 1){
                return 1;
            }
            else{
                return 0;
            }
            
        }
        return 0;
        
    }
    public function changeFormPaymentStatus(Request $request){
        $id = $request->rollno;
        $status = FormData::find($id);
        if($status->payment != 1){
        $status->payment = 1;
        }
        else{
            $status->payment = 0;
        }
        $status->save();
        return 1;
    }
    private function mail($email){
        $details = [
            'title' => 'Cosmos College of Management and Technology ',
            'body' => "Your form is Accepted ",
            'message'=>'Please contact to Administrater for any query !',
            'contact'=>'015550878 , 015151350',
        ];
        $mail = \Mail::to($email)->send(new \App\Mail\FormApproveMessage($details));
        if($mail){
            return 1;
        }
        else{
            return 0;
        }







        
    }
    public function viewstudentdata($id){
        
        $formdata = FormData::find($id);
        // dd($formdata);
        return view('admin.viewformdatas.view' , compact('formdata'));
    }



    public function seenForm(Request $request){
        $formdata = FormData::find($request->formid);
        $formdata['seen'] = '1';
        $formdata->save();
        return 1;
    }
    
}
