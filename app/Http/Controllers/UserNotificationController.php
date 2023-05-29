<?php

namespace App\Http\Controllers;
use App\Models\UserNotification;
use Illuminate\Http\Request;

class UserNotificationController extends Controller
{
    public function index(){
        $notifications = UserNotification::where('status',1)->latest()->paginate(15);
        return view('frontend.homepage',compact('notifications'));
    }

}
