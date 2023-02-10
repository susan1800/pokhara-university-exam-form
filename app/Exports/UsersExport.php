<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;
use App\Invoice;
use App\Models\Subject;
use App\Models\FormData;
use App\Models\Program;
use App\Models\Level;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;



use Maatwebsite\Excel\HeadingRowImport;


class UsersExport implements FromView
{

public function view(): View
    {
        $program= Program::where('program','Information Technology')->first('id');
        $program_id = $program->id;
        $formdatas = FormData::where('past_semester',0)->where('approve',1)->where('program_id',$program->id)->get();
        $levels = Level::orderBy('id', 'asc')->get();



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


        $subjects = Subject::where('program_id',$program_id)->orderBy('level_id', 'asc')->get();

        // collect($yourArray)->sortBy('Key','ASC')
        return view('admin.invoices',compact('formdatas','levels','program_id','subjects'));

    }

}
