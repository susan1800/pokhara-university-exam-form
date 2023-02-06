<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Level;
use App\Models\User;
use App\Models\KeyValue;
use App\Models\FormData;
class SubjectController extends Controller
{
    public function getSubject(Request $request){



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
        $approved = FormData::where('user_id',$user->id)->where('exam_year',$current_year->value)->where('year',$spring_fall->value)->where('past_semester','0')->where('approve','1')->first();
        if($approved){
            return "<h3 style='text-align:center;'>your form is already accepeted <br> Please contact to exam section for further details</h3>";
        }
        $filledup = FormData::where('user_id',$user->id)->where('exam_year',$current_year->value)->where('year',$spring_fall->value)->where('past_semester','0')->first();
        if($filledup){
            return "<h3 style='text-align:center;'>Form is already submitted<br> please contact to administrator</h3>";
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
        }

        $level = Level::find($request->levelid);
        if($level->level == "first semester"){
            $allsubjects = [];
        }
        elseif($level->level == "second semester"){
            $allsubjects = Subject::where('program_id' , $request->programid)->where('level_id' , $first)->where('newbatch' , $newbatch)->get();
        }
        elseif($level->level == "third semester"){
            $allsubjects = Subject::where('program_id' , $request->programid)->where('level_id' , '<' , $third)->where('newbatch' , $newbatch)->get();
        }
        elseif($level->level == "fourth semester"){
            $allsubjects = Subject::where('program_id' , $request->programid)->Where('level_id' , '<' , $fourth)->where('newbatch' , $newbatch)->get();
        }
        elseif($level->level == "fifth semester"){
            $allsubjects = Subject::where('program_id' , $request->programid)->Where('level_id' , '<' , $fifth)->where('newbatch' , $newbatch)->get();
        }
        elseif($level->level == "sixth semester"){
            $allsubjects = Subject::where('program_id' , $request->programid)->Where('level_id' , '<' , $sixth)->where('newbatch' , $newbatch)->get();
        }
        elseif($level->level == "seventh semester"){
            $allsubjects = Subject::where('program_id' , $request->programid)->Where('level_id' , '<' , $seventh)->where('newbatch' , $newbatch)->get();
        }
        elseif($level->level == "eighth semester"){
            $allsubjects = Subject::where('program_id' , $request->programid)->Where('level_id' , '<' , $eighth)->where('newbatch' , $newbatch)->get();
        }
       else{
        $allsubjects = Subject::where('program_id' , $request->programid)->where('newbatch' , $newbatch)->get();
        }





        if(!empty(session()->get('regulardata')) && !empty(session()->get('backdata'))){
            $regulardatas = session()->get('regulardata');
        $backdatas = session()->get('backdata');
        return view('form.partials.subject' , compact('regulardatas' , 'backdatas','allsubjects'));
        }


        $subjects = Subject::where('program_id' , $request->programid)->where('level_id' , $request->levelid)->where('newbatch' , $newbatch)->get();
        $backdatas = [];
        $regulardatas = [];
        foreach($subjects as $subject){
            if(count($regulardatas)){

                array_push($regulardatas,$subject->id);
            }
            else{
                $regulardatas = [$subject->id];
            }

            if($subject->concurrent_id ){
                $data = Subject::find($subject->concurrent_id);
                if($data->id != $subject->barrier_id){


                if(count($backdatas)){

                    array_push($backdatas,$data->id);
                }
                else{
                    $backdatas = [$data->id];
                }


                if($data->concurrent_id){
                    $data1 = Subject::find($data->concurrent_id);
                    if($data1->id != $subject->barrier_id){
                    array_push($backdatas,$data1->id);


                        if($data1->concurrent_id){

                            $data2 = Subject::find($data1->concurrent_id);
                            if($data2->id != $subject->barrier_id){
                            array_push($backdatas,$data2->id);


                                if($data2->concurrent_id){
                                    $data3 = Subject::find($data2->concurrent_id);
                                    if($data3->id != $subject->barrier_id){
                                    array_push($backdatas,$data3->id);
                                    }

                                }
                            }
                        }
                        }

                }
            }

            }

        }
        $backdatas = array_unique($backdatas);
        session()->put('regulardata', $regulardatas);


        return view('form.partials.subject' , compact('backdatas' , 'regulardatas','allsubjects'));
    }
}
