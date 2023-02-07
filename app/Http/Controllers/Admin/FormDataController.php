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
use App\Models\Level;
use App\Models\Subject;
use App\Models\User;
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
            $this->mail($status->user->email);

                return 1;


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

        FormData::where("past_semester", "0")
                ->update(["past_semester" => "1"]);
        $current_year = KeyValue::where('key','current_year')->first();
        $spring_fall = KeyValue::where('key','spring_fall')->first();
        $updateyear = KeyValue::find($current_year->id);
        if($spring_fall->value == 'spring'){
            $updateyear->value = $current_year->value+1;
        }

        $updateyear->save();

        $updatespring_fall = KeyValue::find($spring_fall->id);
        if($spring_fall->value == 'spring'){
            $updatespring_fall->value = 'fall';
        }else{
            $updatespring_fall->value = 'spring';
        }
        $updatespring_fall->save();


        DB::commit();
        return 1;
        }catch (\Throwable $e) {
            DB::rollback();
             return 0;
        }
    }
    public function printdata($title){
        $levels = Level::get();
        foreach($levels as $level){
            if($level->level == "first semester"){
                $first = $level->id;
            }
            if($level->level == "second semester"){
                $second = $level->id;
            }
            if($level->level == "third semester"){
                $third = $level->id;
            }
            if($level->level == "fourth semester"){
                $fourth = $level->id;
            }
            if($level->level == "fifth semester"){
                $fifth = $level->id;
            }
            if($level->level == "sixth semester"){
                $sixth = $level->id;
            }
            if($level->level == "seventh semester"){
                $seventh = $level->id;
            }
            if($level->level == "eighth semester"){
                $eighth = $level->id;
            }
            if($level->level == "ninth semester"){
                $ninth = $level->id;
            }
            if($level->level == "tenth semester"){
                $tenth = $level->id;
            }
            if($level->level == "Passover"){
                $passover = $level->id;
            }
        }
        if($title == "first_year"){
            $formdatas = FormData::where('past_semester','0')->where('approve','1')->where('level_id',$first)->orWhere('level_id',$second)->get();
        }
        elseif($title == "second_year"){
            $formdatas = FormData::where('past_semester','0')->where('approve','1')->where('level_id',$third)->orWhere('level_id',$fourth)->get();
        }
        elseif($title == "third_year"){
            $formdatas = FormData::where('past_semester','0')->where('approve','1')->where('level_id',$fifth)->orWhere('level_id',$sixth)->get();
        }
        elseif($title == "forth_year"){
            $formdatas = FormData::where('past_semester','0')->where('approve','1')->where('level_id',$seventh)->orWhere('level_id',$eighth)->get();
        }
        elseif($title == "fifth_year"){
            $formdatas = FormData::where('past_semester','0')->where('approve','1')->where('level_id',$ninth)->orWhere('level_id',$tenth)->get();
        }
        elseif($title=="passover"){


                $formdatas = FormData::where('past_semester','0')->where('approve','1')->where('level_id',$passover)->get();

        }
        else{

                $formdatas = FormData::where('past_semester','0')->where('approve','1')->get();

        }



        // dd($formdatas);
        return view('admin.viewformdatas.print' , compact('formdatas'));


    }




    public function editdata($id){
        $user_id = session()->get('sessionuseridcosmos');
        $user = User::find($user_id);
        if($user->roll_no >= 220000){
            $newbatch = 1;
        }
        else{
            $newbatch = 0;
        }
        $current_year = KeyValue::where('key','current_year')->first();
        $spring_fall = KeyValue::where('key','spring_fall')->first();
        $open = KeyValue::where('key','open')->first();

        $formdata = FormData::find($id);
        $regulardatas=[];
        $backdatas = [];
        foreach($formdata->subject as $subject){
            array_push($regulardatas,$subject->id);

        }

        foreach($formdata->backSubject as $subject){
            array_push($backdatas,$subject->id);

        }




        $levels = Level::get();
        foreach($levels as $level){
            if($level->level == "first semester"){
                $first = $level->id;
            }
            if($level->level == "second semester"){
                $second = $level->id;
            }
            if($level->level == "third semester"){
                $third = $level->id;
            }
            if($level->level == "fourth semester"){
                $fourth = $level->id;
            }
            if($level->level == "fifth semester"){
                $fifth = $level->id;
            }
            if($level->level == "sixth semester"){
                $sixth = $level->id;
            }
            if($level->level == "seventh semester"){
                $seventh = $level->id;
            }
            if($level->level == "eighth semester"){
                $eighth = $level->id;
            }
            if($level->level == "ninth semester"){
                $ninth = $level->id;
            }
            if($level->level == "tenth semester"){
                $tenth = $level->id;
            }
        }


        $level = Level::find($formdata->level_id);
        if($level->level == "first semester"){
            $allsubjects = [];
        }
        elseif($level->level == "second semester"){
            if($newbatch == 0){
                $allsubjects = Subject::where('program_id' , $request->programid)->where('level_id' , $first)->where('newbatch' , $newbatch)->get();
            }else{
                $allsubjects = [];
            }

        }
        elseif($level->level == "third semester"){
            if($newbatch == 0){

                $allsubjects = Subject::where('program_id' , $request->programid)->where('level_id' , '<' , $third)->where('newbatch' , $newbatch)->get();
            }else{
                $allsubjects = Subject::where('program_id' , $request->programid)->where('level_id' , $first)->where('newbatch' , $newbatch)->get();
            }

        }
        elseif($level->level == "fourth semester"){
            if($newbatch ==0){
                $allsubjects = Subject::where('program_id' , $request->programid)->Where('level_id' , '<' , $fourth)->where('newbatch' , $newbatch)->get();
            }else{
                $allsubjects = Subject::where('program_id' , $request->programid)->Where('level_id'  , $second)->where('newbatch' , $newbatch)->get();
                // ->orWhere('d', '=', 1);
            }
        }
        elseif($level->level == "fifth semester"){
            if($newbatch ==0){
                $allsubjects = Subject::where('program_id' , $request->programid)->Where('level_id' , '<' , $fifth)->where('newbatch' , $newbatch)->get();
            }else{
                $allsubjects = Subject::where('program_id' , $request->programid)->Where('level_id'  , $first)->orWhere('level_id', '=', $third)->where('newbatch' , $newbatch)->get();
            }
        }
        elseif($level->level == "sixth semester"){
            if($newbatch == 0){
                $allsubjects = Subject::where('program_id' , $request->programid)->Where('level_id' , '<' , $sixth)->where('newbatch' , $newbatch)->get();
            }else{

                $allsubjects = Subject::where('program_id' , $request->programid)->Where('level_id'  , $second)->orWhere('level_id', '=', $fourth)->where('newbatch' , $newbatch)->get();
            }

        }
        elseif($level->level == "seventh semester"){
            if($newbatch == 0){
            $allsubjects = Subject::where('program_id' , $formdata->program_id)->Where('level_id' , '<' , $seventh)->where('newbatch' , $newbatch)->get();
        }else{
            $allsubjects = Subject::where('program_id' , $formdata->program_id)->Where('level_id'  , $first)->orWhere('level_id', '=', $third)->orWhere('level_id',$fifth)->where('newbatch' , $newbatch)->get();
        }
        }
        elseif($level->level == "eighth semester"){
            if($newbatch == 0){


            $allsubjects = Subject::where('program_id' , $formdata->program_id)->Where('level_id' , '<' , $eighth)->where('newbatch' , $newbatch)->get();
            }else{
                $allsubjects = Subject::where('program_id' , $formdata->program_id)->Where('level_id'  , $second)->orWhere('level_id', '=', $fourth)->orWhere('level_id',$sixth)->where('newbatch' , $newbatch)->get();
            }
        }
        elseif($level->level == "ninth semester"){
            if($newbatch == 0){


            $allsubjects = Subject::where('program_id' , $formdata->program_id)->Where('level_id' , '<' , $ninth)->where('newbatch' , $newbatch)->get();
            }else{
                $allsubjects = Subject::where('program_id' , $formdata->program_id)->Where('level_id'  , $first)->orWhere('level_id', '=', $third)->orWhere('level_id',$fifth)->orWhere('level_id',$seventh)->where('newbatch' , $newbatch)->get();
            }
        }
        elseif($level->level == "tenth semester"){
            if($newbatch == 0){


            $allsubjects = Subject::where('program_id' , $formdata->program_id)->Where('level_id' , '<' , $tenth)->where('newbatch' , $newbatch)->get();
            }else{
                $allsubjects = Subject::where('program_id' , $formdata->program_id)->Where('level_id'  , $second)->orWhere('level_id', '=', $fourth)->orWhere('level_id',$sixth)->orWhere('level_id',$eighth)->where('newbatch' , $newbatch)->get();
            }
        }
       else{
        if($newbatch == 0){
            $allsubjects = Subject::where('program_id' , $formdata->program_id)->where('newbatch' , $newbatch)->get();
        }else{
            if($spring_fall =='fall'){
            $allsubjects = Subject::where('program_id' , $formdata->program_id)->Where('level_id'  , $first)->orWhere('level_id', '=', $third)->orWhere('level_id',$fifth)->orWhere('level_id',$seventh)->orWhere('level_id',$ninth)->where('newbatch' , $newbatch)->get();
        }else{
            $allsubjects = Subject::where('program_id' , $formdata->program_id)->Where('level_id'  , $second)->orWhere('level_id', '=', $fourth)->orWhere('level_id',$sixth)->orWhere('level_id',$eighth)->orWhere('level_id',$tenth)->where('newbatch' , $newbatch)->get();
        }
        }
        }





        return view('admin.viewformdatas.edit',compact('backdatas','regulardatas','allsubjects'));
    }




}
