<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KeyValue;
class ViewFormDataController extends Controller
{
    public function index(){
        $notification = KeyValue::where('key','notification_count')->first();
         $this->setPageTitle('dashboard', 'dashboard');
        return view('/admin/dashboard/index' , 'notification');
    }

}
