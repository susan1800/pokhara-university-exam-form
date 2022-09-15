<?php

namespace App\Imports;

use App\Models\PaymentStatus;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class UsersPaymentImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new PaymentStatus([
        
                "roll_no" => $row['roll_no'],
                "name" => $row['student_name'],
                "status" => 0,
                "approve_form" => 0,
        ]);
    }
}
