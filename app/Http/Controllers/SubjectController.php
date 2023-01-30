<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Level;
class SubjectController extends Controller
{
    public function getSubject(Request $request){

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
            $allsubjects = Subject::where('program_id' , $request->programid)->where('level_id' , $first)->get();
        }
        elseif($level->level == "third semester"){
            $allsubjects = Subject::where('program_id' , $request->programid)->where('level_id' , '<' , $third)->get();
        }
        elseif($level->level == "fourth semester"){
            $allsubjects = Subject::where('program_id' , $request->programid)->Where('level_id' , '<' , $fourth)->get();
        }
        elseif($level->level == "fifth semester"){
            $allsubjects = Subject::where('program_id' , $request->programid)->Where('level_id' , '<' , $fifth)->get();
        }
        elseif($level->level == "sixth semester"){
            $allsubjects = Subject::where('program_id' , $request->programid)->Where('level_id' , '<' , $sixth)->get();
        }
        elseif($level->level == "seventh semester"){
            $allsubjects = Subject::where('program_id' , $request->programid)->Where('level_id' , '<' , $seventh)->get();
        }
        elseif($level->level == "eighth semester"){
            $allsubjects = Subject::where('program_id' , $request->programid)->Where('level_id' , '<' , $eighth)->get();
        }
       else{
        $allsubjects = Subject::where('program_id' , $request->programid)->get();
        }
        $subjects = Subject::where('program_id' , $request->programid)->where('level_id' , $request->levelid)->get();
        
        
        return view('form.partials.subject' , compact('subjects' , 'allsubjects'));
    }
}
