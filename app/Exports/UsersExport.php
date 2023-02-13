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

use Maatwebsite\Excel\Concerns\WithTitle;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

use Maatwebsite\Excel\HeadingRowImport;


class UsersExport implements  WithMultipleSheets
{
    private $program;
    private $batch;
    public function __construct(String $program, String $batch)
    {

        $this->batch = $batch;
        $this->program = $program;
    }


public function sheets() : array
{

    $sheets = [];


      $program= Program::where('program',$this->program)->first(['id','program']);


    $levels = Level::orderBy('id', 'asc')->get();


    foreach($levels as $level){
        if($level->level != 'Passover'){
            $sheets[] = new ViewExoprt($level->id, $program->id,$level->level,$program->program,$this->batch);

        }
    }
    return $sheets;



}

}
