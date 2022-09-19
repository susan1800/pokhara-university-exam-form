<?php

namespace App\Http\Controllers;
use App\Models\Subject;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BarrierConcurrentController extends Controller
{
    public function checkBarrierAndConcurrent(Request $request){
    // dd($request->backsub);
        $backconcurrent = Subject::find($request->subjectid);
        $backs = explode(',',$request->backsub);
        $addbacksub = Subject::find($request->addbacksub);
        
        if($backconcurrent){

            if($backconcurrent->concurrent_id){
                $backconcurrent = Subject::find($backconcurrent->concurrent_id);
                
            }
            else{
                $backconcurrent = "";
            }
        }
        else{
            $backconcurrent = "";
        }
        // dd($backs, $backconcurrent , $addbacksub);


        foreach($backs as $back){
          
                if($back == $backconcurrent){
                    if(!empty($backconcurrent)){
                        dd($backconcurrent);
                    }
                    
                }


            

            if($back==$addbacksub->id){
                $addbacksub=[];
                break;
            }
        }






        return view('form.partials.addbacksubject' , compact('backs' , 'backconcurrent' , 'addbacksub'));
    }

    public function removeBackSubject(Request $request){
        $removeid = $request->subjectid;
        $backs = explode(',',$request->backsub);
        
        $i=0;
        foreach($backs as $back){
            if($back == $removeid){
                $backs[$i]="";
                break;
            }
            $i++;
        }
        $backconcurrent = "";
        $addbacksub = "";
        return view('form.partials.addbacksubject' , compact('backs' , 'backconcurrent' , 'addbacksub'));
    }
}
