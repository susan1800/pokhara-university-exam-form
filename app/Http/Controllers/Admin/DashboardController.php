<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Models\KeyValue;
use App\Models\FormData;
use App\Models\User;
use Artisan;
use Cache;

class DashboardController extends BaseController
{
    public function index(){
        $notification = KeyValue::where('key','notification_count')->first();
    $this->setPageTitle('dashboard', 'dashboard');
    $formfilled = count(FormData::where('past_semester' , 0)->get());

    $formapproved = count(FormData::where('past_semester' , 0)->where('approve' , 1)->get());
    $formapprovedremaining = count(FormData::where('past_semester' , 0)->where('approve',0)->get());

    $newform = count(FormData::where('past_semester' , 0)->where('seen',0)->get());


    $totalstudent = count(User::get());

    $approvelogin = count(User::where('approve_form' , 1)->get());
        return view('/admin/dashboard/index' , compact('approvelogin','totalstudent' ,'notification' , 'formfilled' , 'formapproved' , 'formapprovedremaining' , 'newform'));
        }


        function clearCache(Request $request)
    {
        Artisan::call('cache:clear');
        return "Cache cleared successfully";
    }
}
