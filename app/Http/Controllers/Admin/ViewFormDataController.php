<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NotificationCount;
class ViewFormDataController extends Controller
{
    public function index(){
        $notification = NotificationCount::first();
         $this->setPageTitle('dashboard', 'dashboard');
        return view('/admin/dashboard/index' , 'notification');
    }
    
}
