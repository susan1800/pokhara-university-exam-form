<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            "name" => $row['name'],
            "roll_no" => $row['roll_no'],
            "email" => $row['email'],
            "phone" => $row['mobile_number'],
            "role_id" => 2, // User Type User
            "status" => 1,
            "password" => Hash::make('password')
        ]);
    }
}