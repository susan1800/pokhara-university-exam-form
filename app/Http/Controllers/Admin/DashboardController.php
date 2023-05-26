<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Models\KeyValue;
use App\Models\FormData;
use App\Models\PaymentStatus;
use Artisan;
use Cache;

class DashboardController extends BaseController
{
    public function index(){
    // $user = User::count();
    //     $subject = subject::count();
    //     $program = program::count();
    //     $sociallinks=sociallink::whereNull('creator_id')->get();

    //     $reviews=feedback::all();
        $notification = KeyValue::where('key','notification_count')->first();
    $this->setPageTitle('dashboard', 'dashboard');
    $formfilled = count(FormData::where('past_semester' , 0)->get());

    $formapproved = count(FormData::where('approve' , 1)->get());
    $formapprovedremaining = count(FormData::where('approve',0)->get());

    $newform = count(FormData::where('seen',0)->get());


    $totalstudent = count(PaymentStatus::get());

    $approvelogin = count(PaymentStatus::where('approve_form' , 1)->get());
        return view('/admin/dashboard/index' , compact('approvelogin','totalstudent' ,'notification' , 'formfilled' , 'formapproved' , 'formapprovedremaining' , 'newform'));
        }


        function clearCache(Request $request)
    {
        Artisan::call('cache:clear');
        return "Cache cleared successfully";
    }
}
