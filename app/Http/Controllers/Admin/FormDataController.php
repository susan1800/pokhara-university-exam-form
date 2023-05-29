<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Models\FormData;
use Illuminate\Support\Facades\DB;
use App\Models\FormDataBackSubject;
use App\Models\FormDataSubject;
use App\Models\Program;
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
        return view('/admin/viewformdatas/index' , compact('formDatas'));
    }

    public function getolddata(){
        $formDatas = FormData::latest()->where('past_semester','1')->paginate(30);
        $this->setPageTitle('view old form', 'view old form');
        return view('/admin/viewformdatas/index' , compact('formDatas'));
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


    public function export($program ,$batch)
    {


        return Excel::download(new UsersExport($program,$batch), 'triplicate.xlsx');

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



        $students = User::where('approve_form', '1')->update(['approve_form' => '0']);








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

        $current_year = KeyValue::where('key','current_year')->first();
        $spring_fall = KeyValue::where('key','spring_fall')->first();
        $open = KeyValue::where('key','open')->first();

        $formdata = FormData::find($id);


        $form_id = $formdata->id;

        if($formdata->college_roll_no >= 220000){
            $newbatch = 1;
            $subjectBatch = 1;
        }
        else{
            $newbatch = 0;
            $subjectBatch = 0;
        }

        $roll = str_split($formdata->college_roll_no);
        if($roll[3]==7){
            if($formdata->college_roll_no >= 200000){

                $subjectBatch = 1;
            }
            elseif($formdata->college_roll_no >= 190000){
                $subjectBatch = 01;
            }
            else{
                $subjectBatch = 0;
            }
        }
        if($roll[3]==4){
            $subjectBatch =0;
        }

        $regulardatas=[];
        $backdatas = [];
        foreach($formdata->subject as $subject){

            array_push($regulardatas,$subject->subject_id);

        }

        foreach($formdata->backSubject as $subject){
            array_push($backdatas,$subject->subject_id);

        }
        // dd($regulardatas);




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
                $allsubjects = Subject::where('program_id' , $request->programid)->where('level_id' , $first)->where('newbatch' , $subjectBatch)->get();
            }else{
                $allsubjects = [];
            }

        }
        elseif($level->level == "third semester"){
            if($newbatch == 0){

                $allsubjects = Subject::where('program_id' , $request->programid)->where('level_id' , '<' , $third)->where('newbatch' , $subjectBatch)->get();
            }else{
                $allsubjects = Subject::where('program_id' , $request->programid)->where('level_id' , $first)->where('newbatch' , $subjectBatch)->get();
            }

        }
        elseif($level->level == "fourth semester"){
            if($newbatch ==0){
                $allsubjects = Subject::where('program_id' , $request->programid)->Where('level_id' , '<' , $fourth)->where('newbatch' , $subjectBatch)->get();
            }else{
                $allsubjects = Subject::where('program_id' , $request->programid)->Where('level_id'  , $second)->where('newbatch' , $subjectBatch)->get();
                // ->orWhere('d', '=', 1);
            }
        }
        elseif($level->level == "fifth semester"){
            if($newbatch ==0){
                $allsubjects = Subject::where('program_id' , $request->programid)->Where('level_id' , '<' , $fifth)->where('newbatch' , $subjectBatch)->get();
            }else{
                $allsubjects = Subject::where('program_id' , $request->programid)->Where('level_id'  , $first)->orWhere('level_id', '=', $third)->where('newbatch' , $subjectBatch)->get();
            }
        }
        elseif($level->level == "sixth semester"){
            if($newbatch == 0){
                $allsubjects = Subject::where('program_id' , $request->programid)->Where('level_id' , '<' , $sixth)->where('newbatch' , $subjectBatch)->get();
            }else{

                $allsubjects = Subject::where('program_id' , $request->programid)->Where('level_id'  , $second)->orWhere('level_id', '=', $fourth)->where('newbatch' , $subjectBatch)->get();
            }

        }
        elseif($level->level == "seventh semester"){
            if($newbatch == 0){
            $allsubjects = Subject::where('program_id' , $formdata->program_id)->Where('level_id' , '<' , $seventh)->where('newbatch' , $subjectBatch)->get();
        }else{
            $allsubjects = Subject::where('program_id' , $formdata->program_id)->Where('level_id'  , $first)->orWhere('level_id', '=', $third)->orWhere('level_id',$fifth)->where('newbatch' , $subjectBatch)->get();
        }
        }
        elseif($level->level == "eighth semester"){
            if($newbatch == 0){


            $allsubjects = Subject::where('program_id' , $formdata->program_id)->Where('level_id' , '<' , $eighth)->where('newbatch' , $subjectBatch)->get();
            }else{
                $allsubjects = Subject::where('program_id' , $formdata->program_id)->Where('level_id'  , $second)->orWhere('level_id', '=', $fourth)->orWhere('level_id',$sixth)->where('newbatch' , $subjectBatch)->get();
            }
        }
        elseif($level->level == "ninth semester"){
            if($newbatch == 0){


            $allsubjects = Subject::where('program_id' , $formdata->program_id)->Where('level_id' , '<' , $ninth)->where('newbatch' , $subjectBatch)->get();
            }else{
                $allsubjects = Subject::where('program_id' , $formdata->program_id)->Where('level_id'  , $first)->orWhere('level_id', '=', $third)->orWhere('level_id',$fifth)->orWhere('level_id',$seventh)->where('newbatch' , $subjectBatch)->get();
            }
        }
        elseif($level->level == "tenth semester"){
            if($newbatch == 0){


            $allsubjects = Subject::where('program_id' , $formdata->program_id)->Where('level_id' , '<' , $tenth)->where('newbatch' , $subjectBatch)->get();
            }else{
                $allsubjects = Subject::where('program_id' , $formdata->program_id)->Where('level_id'  , $second)->orWhere('level_id', '=', $fourth)->orWhere('level_id',$sixth)->orWhere('level_id',$eighth)->where('newbatch' , $subjectBatch)->get();
            }
        }
       else{
        if($newbatch == 0){
            $allsubjects = Subject::where('program_id' , $formdata->program_id)->where('newbatch' , $subjectBatch)->get();
        }else{
            if($spring_fall =='fall'){
            $allsubjects = Subject::where('program_id' , $formdata->program_id)->Where('level_id'  , $first)->orWhere('level_id', '=', $third)->orWhere('level_id',$fifth)->orWhere('level_id',$seventh)->orWhere('level_id',$ninth)->where('newbatch' , $subjectBatch)->get();
        }else{
            $allsubjects = Subject::where('program_id' , $formdata->program_id)->Where('level_id'  , $second)->orWhere('level_id', '=', $fourth)->orWhere('level_id',$sixth)->orWhere('level_id',$eighth)->orWhere('level_id',$tenth)->where('newbatch' , $subjectBatch)->get();
        }
        }
        }



        $this->setPageTitle('Edit form', 'Edit form');
        $notification = KeyValue::where('key','notification_count')->first();

        return view('admin.viewformdatas.edit',compact('backdatas','regulardatas','allsubjects','subjectBatch','notification','form_id','formdata'));
    }



    public function changeBarrier(Request $request){

        try{

        $subject = Subject::where('subject_code',$request->subject)->first();

        $data = FormDataSubject::where('form_data_id',$request->form_id)->where('subject_id',$subject->id)->first();

        $changesubject =Subject::where('subject_code',$request->change_barrier)->first();
        $update= FormDataSubject::find($data->id);

        $update->subject_id = $changesubject->id;
        $update->save();
        return 1;
        }catch (QueryException $exception) {
            return 0;
        }
    }




    public function removeBack(Request $request){
        try{
        $remove = FormDataBackSubject::where('form_data_id',$request->form_id)->where('subject_id',$request->id)->delete();
        // dd($remove);
        return 1;
        // $remove->delete();
    }catch (QueryException $exception) {
        return 0;
    }

    }



    public function addBack(Request $request){
        try{
            $insert = new FormDataBackSubject();
            $insert->form_data_id = $request->form_id;
            $insert->subject_id = $request->id;

            $insert->save();
            return 1;
        }catch (QueryException $exception) {
            return 0;
        }

    }




}
