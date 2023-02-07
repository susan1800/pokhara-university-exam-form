<?php

namespace App\Http\Controllers;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Level;
use App\Models\FormData;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
use Illuminate\Support\Facades\Storage;
use App\Models\FormDataSubject;
use App\Models\FormDataBackSubject;
use App\Models\Subject;
use App\Models\Notification;
use App\Models\PaymentStatus;
use App\Models\KeyValue;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;
use App\Notifications\OffersNotification;


class FormFillupController extends BaseController
{
    public function index(){

        $levels = Level::get();
        $user_id=session()->get('sessionuseridcosmos');
        $user = User::find($user_id);
        $data = PaymentStatus::where('roll_no',$user->roll_no)->first();

        $roll=str_split("$data->roll_no");

        if($roll[3]==1){
            $myprogram="Information Technology";
        }
        if($roll[3]==2){
            $myprogram="Electronics";
        }
        if($roll[3]==3){
            $myprogram="Computer";
        }
        if($roll[3]==5 || $roll[3]==6){
            $myprogram="Civil";
        }
        if($roll[3]==7){
            $myprogram="Architecture";
        }
        if($roll[3]==4){
            $myprogram="BBA";
        }


        $current_year = KeyValue::where('key','current_year')->first();
        $spring_fall = KeyValue::where('key','spring_fall')->first();
        $year=str_split("$current_year->value");
        $student_year = $year[0].$year[1].$roll[0].$roll[1];

        if((int)$current_year->value-(int)$student_year == 1){
            if($spring_fall->value == 'fall'){
                $semester = 'first semester';
            }
            if($spring_fall->value == 'spring'){
                $semester = 'second semester';
            }
        }
        elseif((int)$current_year->value-(int)$student_year == 2){
            if($spring_fall->value == 'fall'){
                $semester = 'third semester';
            }
            if($spring_fall->value == 'spring'){
                $semester = 'forth semester';
            }
        }
        elseif((int)$current_year->value-(int)$student_year == 3){
            if($spring_fall->value == 'fall'){
                $semester = 'fifth semester';
            }
            if($spring_fall->value == 'spring'){
                $semester = 'sixth semester';
            }
        }
        elseif((int)$current_year->value-(int)$student_year == 4){
            if($spring_fall->value == 'fall'){
                $semester = 'seventh semester';
            }
            if($spring_fall->value == 'spring'){
                $semester = 'eighth semester';
            }
        }

        elseif((int)$current_year->value-(int)$student_year == 5){
            if($myprogram == "Architecture"){
                if($spring_fall->value == 'fall'){
                    $semester = 'ninth semester';
                }
                if($spring_fall->value == 'spring'){
                    $semester = 'tenth semester';
                }
            }
            else{
                $semester = 'Passover';
            }
        }
        else{

                $semester = 'Passover';

        }


        $programs = Program::get();
        return view('form.fillupform' , compact('levels' , 'programs' ,'data','spring_fall','semester','myprogram'));
    }

    public function store(request $request)
    {

        $this->validate($request, [
            'name'      =>  'required',
            'year'      =>  'required',
            'registration_no' =>  'required',
            'program'      =>  'required',
            'level' =>'required',
            'formimage' =>  'required|mimes:jpg,jpeg,png',
            'signature'  => 'required',

        ]);


    try {



    if($request->signature == "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAS4AAACYCAYAAABapASfAAAAAXNSR0IArs4c6QAABHBJREFUeF7t1AEJAAAMAsHZv/RyPNwSyDncOQIECMQEFssrLgECBM5weQICBHIChitXmcAECBguP0CAQE7AcOUqE5gAAcPlBwgQyAkYrlxlAhMgYLj8AAECOQHDlatMYAIEDJcfIEAgJ2C4cpUJTICA4fIDBAjkBAxXrjKBCRAwXH6AAIGcgOHKVSYwAQKGyw8QIJATMFy5ygQmQMBw+QECBHIChitXmcAECBguP0CAQE7AcOUqE5gAAcPlBwgQyAkYrlxlAhMgYLj8AAECOQHDlatMYAIEDJcfIEAgJ2C4cpUJTICA4fIDBAjkBAxXrjKBCRAwXH6AAIGcgOHKVSYwAQKGyw8QIJATMFy5ygQmQMBw+QECBHIChitXmcAECBguP0CAQE7AcOUqE5gAAcPlBwgQyAkYrlxlAhMgYLj8AAECOQHDlatMYAIEDJcfIEAgJ2C4cpUJTICA4fIDBAjkBAxXrjKBCRAwXH6AAIGcgOHKVSYwAQKGyw8QIJATMFy5ygQmQMBw+QECBHIChitXmcAECBguP0CAQE7AcOUqE5gAAcPlBwgQyAkYrlxlAhMgYLj8AAECOQHDlatMYAIEDJcfIEAgJ2C4cpUJTICA4fIDBAjkBAxXrjKBCRAwXH6AAIGcgOHKVSYwAQKGyw8QIJATMFy5ygQmQMBw+QECBHIChitXmcAECBguP0CAQE7AcOUqE5gAAcPlBwgQyAkYrlxlAhMgYLj8AAECOQHDlatMYAIEDJcfIEAgJ2C4cpUJTICA4fIDBAjkBAxXrjKBCRAwXH6AAIGcgOHKVSYwAQKGyw8QIJATMFy5ygQmQMBw+QECBHIChitXmcAECBguP0CAQE7AcOUqE5gAAcPlBwgQyAkYrlxlAhMgYLj8AAECOQHDlatMYAIEDJcfIEAgJ2C4cpUJTICA4fIDBAjkBAxXrjKBCRAwXH6AAIGcgOHKVSYwAQKGyw8QIJATMFy5ygQmQMBw+QECBHIChitXmcAECBguP0CAQE7AcOUqE5gAAcPlBwgQyAkYrlxlAhMgYLj8AAECOQHDlatMYAIEDJcfIEAgJ2C4cpUJTICA4fIDBAjkBAxXrjKBCRAwXH6AAIGcgOHKVSYwAQKGyw8QIJATMFy5ygQmQMBw+QECBHIChitXmcAECBguP0CAQE7AcOUqE5gAAcPlBwgQyAkYrlxlAhMgYLj8AAECOQHDlatMYAIEDJcfIEAgJ2C4cpUJTICA4fIDBAjkBAxXrjKBCRAwXH6AAIGcgOHKVSYwAQKGyw8QIJATMFy5ygQmQMBw+QECBHIChitXmcAECBguP0CAQE7AcOUqE5gAAcPlBwgQyAkYrlxlAhMgYLj8AAECOQHDlatMYAIEDJcfIEAgJ2C4cpUJTICA4fIDBAjkBAxXrjKBCRAwXH6AAIGcgOHKVSYwAQKGyw8QIJATMFy5ygQmQMBw+QECBHIChitXmcAECBguP0CAQE7AcOUqE5gAAcPlBwgQyAkYrlxlAhMg8F2bAJlDULv5AAAAAElFTkSuQmCC"){
        Alert::warning('Congrats', 'Please fill the signature');
        return $this->responseRedirectBack('Please fill all the details including signature .', 'error', true, true)->withInput($request->input());
    }
    $user_id = $request->session()->get('sessionuseridcosmos');
    $user = User::find($user_id);

    $formId = FormData::where('user_id' , $user_id)->where('past_semester' , '0')->first();

    if($formId){
    //     $this->setFlashMessage("You Already submitted Your Form Please contact to administrator for any query !", 'error');
        return $this->responseRedirectBack('You Already submitted Your Form Please contact to administrator for any query !', 'error', true, true)->withInput($request->input());
    }

    $signature = $this->uploadsignature($request->signature);
if($signature == 0){
    return $this->responseRedirectBack('Error occurred while creating form. Please try again .', 'error', true, true)->withInput($request->input());
}
        $filename = null;
        $uploadedFile = $request->file('formimage');
        $filename = time().Str::random(25).'.'. $uploadedFile->getClientOriginalExtension();
        Storage::disk('public')->putFileAs(
            'formimage',
            $uploadedFile,
            $filename
        );

        DB::beginTransaction();
        if($this->createFormData($request , $user_id , $filename , $signature)==0){

            return $this->responseRedirectBack('Error occurred while submiting the form. Please try again with fill all the field.', 'error', true, true)->withInput($request->input());
        }

        $formId = FormData::where('user_id' , $user_id)->first();


       if($this->createRegularSubject($request , $formId['id'])==0){

        return $this->responseRedirectBack('Error occurred while creating Regular subject. Please try again. regular subject', 'error', true, true)->withInput($request->input());
       }


       $backSubject = $this->createBackSubject($request , $formId['id']);
       if($backSubject==0){

        return $this->responseRedirectBack('Error occurred while creating Back subject. Please try again.', 'error', true, true)->withInput($request->input());
       }

       if($this->createNotification($formId['id'])==0){

       }
       if($this->incrementNotificationCount()==0){

       }
       $userdetails = User::find($user_id);

    $split = str_split($userdetails->roll_no);
    $year="";
    for($i=0;$i<2;$i++){
        $year = $year.$split[$i];
    }



    if($year > 16){
        $level = Level::where('id' , $formId['level_id'])->first();
        if($level->level == "Passover"){
            if($backSubject > 5){
                $totalfee = 2500 + ($backSubject-6)*300;
            }
            else{
                $totalfee = 2500;
            }
        }else{
            $totalfee = 2500 + ($backSubject-1)*300;
        }
    }else{
        $level = Level::where('id' , $formId['level_id'])->first();
        if($level->level == "Passover"){
            if($backSubject > 5){
                $totalfee = 1500 + ($backSubject-6)*300;
            }
            else{
                $totalfee = 1500;
            }
        }else{
            $totalfee = 1500 + ($backSubject-1)*300;
        }
    }

       DB::commit();

         $date =Carbon::now();

       $totalfee = $hashcode =Crypt::encryptString($totalfee);
       $userrollno = $user->roll_no.'_'.time();
       return redirect()->route('payment.showpaymentmethod' , compact('totalfee' , 'backSubject','userrollno'));






       return $this->responseRedirectBack('Form submit successfully.', 'success', true, true);
    } catch (QueryException $exception) {
        return $this->responseRedirectBack('Error occurred while creating form.  Please tyy again.', 'error', true, true)->withInput($request->input());
    }
    }

    private function uploadsignature($signature){
        try{

    $folderPath = public_path('upload/');

    $image_parts = explode(";base64,", $signature);

    $image_type_aux = explode("image/", $image_parts[0]);

    $image_type = $image_type_aux[1];

    $image_base64 = base64_decode($image_parts[1]);

    $signature = uniqid() . '.'.$image_type;

    $file = $folderPath . $signature;

    file_put_contents($file, $image_base64);
    return $signature;
} catch (QueryException $exception) {
    return 0;
}
    }

    private function createFormData($request , $user_id , $filename , $signature){
        try{
            $user = User::find($user_id);

            $detail = PaymentStatus::where('roll_no',$user->roll_no)->first();
            $current_year = KeyValue::where('key', 'current_year')->first();



        $student= new FormData;

        $student->year=$request->year;
        $student-> exam_roll_no= $request->examrollno;
        $student-> student_details= $detail->id;
        $student-> user_id= $user_id;
        $student-> program_id= $request->program;
        $student-> level_id= $request->level;
        $student->image = 'formimage/'.$filename;
        $student->date = Carbon::now()->format('Y-m-d');
        $student->signature = $signature;
        $student->credit_hours = 0;
        $student->college_roll_no = $user->roll_no;
        $student->exam_year = $current_year->value;

            dd($student);
        $student-> save();


        return 1;
    } catch (QueryException $exception) {

        return 0;
    }
    }


    private function createRegularSubject($request , $formId){
        try{
                for($i=1;$i<9;$i++){
            if($request[$i] != null){

                $regularSubject = new FormDataSubject;
                $regularSubject->form_data_id = $formId;
                $regularSubject->subject_id = $request[$i];

                $regularSubject->save();
            }
        }
        return 1;
    } catch (QueryException $exception) {
        return 0;
    }
    }
    private function createBackSubject($request , $formId){
        try{
            $j=1;
        for($i=150;$i<250;$i++){
            if($request[$i] != null){
                $backSubject = new FormDataBackSubject;
                $backSubject->form_data_id = $formId;
                $backSubject->subject_id = $request[$i];
                $backSubject->save();
                $j++;

            }
        }
        return $j;
    } catch (QueryException $exception) {
        return 0;
    }
    }
    private function createNotification($formId){
        try{
        $notification = new Notification;
        $notification->form_id = $formId;
        $notification->save();
        return 1;
    } catch (QueryException $exception) {
        return 0;
    }
    }
    private function incrementNotificationCount(){
        try{
        $notificationcount = KeyValue::where('key','notification_count')->first();
        $notificationcount = KeyValue::find($notificationcount->id);
        $notificationcount->value += 1;
        $notificationcount->save();
        return 1;
    } catch (QueryException $exception) {
        return 0;
    }
    }














    public function checkCredit(Request $request){

        $level = Level::find($request->level);
        if(($level->level=="first semester") || ($level->level=="second semester") || ($level->level=="third semester") || ($level->level=="fourth semester") || ($level->level=="fifth semester") || ($level->level=="sixth semester")){
            if($request->tablerow <=4){
                return 1;
            }
            else{
                return "youn can add only 3 back subject for (1-6) semester";
            }
        }
        elseif(($level->level=="seventh semester") || ($level->level=="eighth semester") || ($level->level=="ninth semester") || ($level->level=="tenth semester")){
            if($request->tablerow <=5){
                return 1;
            }
            else{
                return "youn can add only 4 back subject for 6 semester or above";
            }
        }
        else{
            $backs = explode(',',$request->backsub);

        $totalcredit = 0;
        foreach($backs as $back){
            if(!empty($back)){
                $subject = Subject::find($back);
                $totalcredit = $totalcredit+$subject->credit_hours;
            }
        }
        if($totalcredit<=24){
            return 1;

        }
        else{
            return "please select subject less than 24 credit !";
        }
        }

    }













    public function submitComplete(){
        $formdata = FormData::where('user_id' , session()->get('sessionuseridcosmos'))->first();
        return view('frontend.completeformsubmit.formsubmitcomplete' , compact('formdata'));
    }

}
