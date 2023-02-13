<?php

namespace App\Exports;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\WithTitle;

use App\Models\Subject;
use App\Models\FormData;
use App\Models\Program;
use App\Models\Level;

class ViewExoprt implements FromView, WithTitle
{
    /**
    * @return \Illuminate\Support\Collection
    */


    private $level_id;
    private $program_id;
    private $level;
    private $program;
    private $batch;


    public function __construct(int $level_id, int $program_id, String $level, String $program, String $batch)
    {
        $this->level_id = $level_id;
        $this->program_id  = $program_id;
        $this->level = $level;
        $this->program = $program;
        $this->batch = $batch;
    }



public function view(): View
{

    $formdatas = FormData::where('past_semester',0)->where('approve',1)->where('program_id',$this->program_id)->get();

    $program_id = $this->program_id;
    $program = $this->program;
    $level = $this->level;

        if($this->batch == 'old'){
            $subjectBatch = 0;
        }
        elseif($this->batch == 'new'){
            $subjectBatch = 1;
        }
        else{
            $subjectBatch = 01;
        }



    $subjects = Subject::where('program_id',$this->program_id)->where('newbatch',$subjectBatch)->where('level_id',$this->level_id)->orderBy('level_id', 'asc')->get();

    return view('admin.invoices',compact('formdatas','program_id','subjects','program','level'));

}


public function title(): string
{
    return $this->level;
}
}
