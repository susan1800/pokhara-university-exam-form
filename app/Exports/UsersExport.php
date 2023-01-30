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
            'Student name',
            'Registration number',
            'exam_roll_no',
            'program',
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
        $formdata =  FormData::where('id' , '>' , '0')->with('subject' , 'backSubject' , 'level' , 'program')->get();
        $i=0;
        foreach($formdata as $data){
            $returndata[$i]['exam_roll_no'] = $data->exam_roll_no ;
            $returndata[$i]['name'] = $data->name;
            $returndata[$i]['registration_no'] = $data->registration_no;
            $returndata[$i]['program'] = $data->program->program;

            $i++;
        }
        // dd($returndata);
       
        return $formdata;

    }







    // public function collection()
    // {
    //     // return FormData::all();
    //     return Excel::download(new UsersExport, 'users.xlsx');
    // }
}
