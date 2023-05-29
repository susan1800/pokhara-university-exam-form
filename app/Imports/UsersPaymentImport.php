<?php

namespace App\Imports;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Auth;
use Illuminate\Support\Facades\DB;
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
        $user =new User();
        $user['name']=$row['name'];
        $user['registration_number']=$row['registration_number'];
        $emailname = explode(" ",$row['name']);
        $user['email'] = $row['roll_no'].strtolower($emailname[0])."@cosmoscollege.edu.np";
        $user['roll_no'] = $row['roll_no'];
        $user['password'] = $row['roll_no'];
        $user['approve_form'] = '0';
        $auth = Auth::where('title','user')->first();
        $user['auth_id'] = $auth->id;
        $user->save();
        // dd($user);
        return $user;
    }
}
