<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

use App\Models\Subject;
use App\Models\FormData;
use App\Models\FormDataSubject;
use App\Models\FormDataBackSubject;
use App\Models\Program;


use Maatwebsite\Excel\HeadingRowImport;


class UsersExport implements FromCollection ,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings(): array
    {
        // TODO: Implement headings() method.
        $header = [
            'exam_roll_no',
            'exam_roll_no',
            'exam_roll_no',
            'exam_roll_no',
            'student_levels' => Array
                (
                    'id',
                    'dfgf',
                    
                )
                ];

        return $header;
            
            
    }


    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $formdata =  select('name' , 'registration_no' , 'exam_roll_no' , 'program_id')->with('regularsubject' , 'backSubject')->all();
        $i=0;
        foreach($formdata as $data){
            $returndata[$i]['exam_roll_no'] = $data->exam_roll_no ;
            $returndata[$i]['name'] = $data->name;
            $returndata[$i]['registration_no'] = $data->registration_no;
            $returndata[$i]['program'] = $data->program->program;

            $i++;
        }
        // dd($returndata);
       
        return $returndata;

    }







    // public function collection()
    // {
    //     // return FormData::all();
    //     return Excel::download(new UsersExport, 'users.xlsx');
    // }
}
