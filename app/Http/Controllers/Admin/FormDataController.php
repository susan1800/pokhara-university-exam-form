<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Models\FormData;
use Illuminate\Support\Facades\DB;
use App\Models\FormDataBackSubject;
use App\Models\FormDataSubject;
use Mail;
use App\Models\KeyValue;
use App\Models\Notification;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;


class FormDataController extends BaseController
{
    public function index(){
        $formDatas = FormData::latest()->where('past_semester','0')->paginate(30);
        $this->setPageTitle('view form', 'view form');
        $notification = KeyValue::where('key','notification_count')->first();
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
        if($formdata->subject == "[]"){
            $formdata->subject->empty = "empty";
        }
        else{
            $formdata->subject->empty = "notempty";
        }
        if($formdata->backsubject =="[]"){
            $formdata->backsubject->empty = "empty";
        }else{
            $formdata->backsubject->empty = "empty";
        }


        return view('admin.viewformdatas.view' , compact('formdata'));
    }



    public function seenForm(Request $request){
        $formdata = FormData::find($request->formid);
        $formdata['seen'] = '1';
        $formdata->save();
        return 1;
    }


    public function export()
    {
        return Excel::download(new UsersExport, 'bulkData.xlsx');
        // $code[0] = 'cvnvhbv';
        // $name[0] = 'dfgcf';
        // $user[0] = 'dfgcf';
        // $number[0] = 'dfgcf';

        // $users = array();
        // array_push($users, array('Code', 'Name', 'User', 'Number'));
        // for ($i=0; $i<count($code); $i++){
        //     array_push($users, array($code[$i], $name[$i], $user[$i], $number[$i]));
        // }

        // Excel::raw($users, Excel::XLSX);

        // // Excel::download/Excel::store($users);


        // // Excel::create('Filename', function($excel) use ($users) {

        // //     $excel->sheet('Sheetname', function($sheet) use ($users) {

        // //         $sheet->fromArray($users);

        // //     });

        // // })->export('xls');
        // return true;










// $formdata = FormData::all();

//         // Array that will be used to generate the sheet
// $sheetArray = array();
// $levels=Level::all();
// $i=0;
// foreach($levels as $level){
//     $levelheader[$i] = $level->level;
//     $levelid[$level] = $level->id;
//     $i++;
// }
// foreach($levelheader as $level){
//     $subjects = Subject::where(['level_id' , $levelid[$level]] , ['program_id' , $formdata[0]->program_id])->get();
// }
// // Add the headers
// $sheetArray[] = array('name','Registration number','roll number',$levelheader,'ACTUAL VAT');

// // Add the results
// foreach($formdata  as $row){

//     $sheetArray[] = array($row->name,$row->registration_no,$row->exam_roll_no,number_format(($row->amount)*15/115,2,'.',','));
// }

// // Generating the sheet from the array
// $sheet->fromArray($sheetArray);

    }




    public function deleteAllData(){
        $resultdata ="";
        $resultregularsubject="";
        $resultbacksubject="";
        DB::beginTransaction();
        try {

        // $resultdata = FormData::whereIn('id', '>','0')->get()->delete();
        // $resultdata =  FormData::getQuery()->delete();
        FormData::where("past_semester", "0")
                ->update(["past_semester" => "1"]);

        // $resultbacksubject = FormDataBackSubject::getQuery()->delete();
        // $resultregularsubject = FormDataSubject::getQuery()->delete();
        // $resultnotification = Notification::getQuery()->delete();

        DB::commit();
        return 1;
        }catch (\Throwable $e) {
            DB::rollback();
             return 0;
        }
    }




}
