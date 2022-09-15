<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Models\Notification;
use App\Models\NotificationCount;
class NotificationController extends BaseController
{
    public function index(){
        $notifications = Notification::latest()->get();
        $notification = NotificationCount::first();
        $this->setPageTitle('Notification', 'Notification');
        return view('/admin/notification/index' , compact('notifications' , 'notification'));
    }
    public function getNotificationCount(){
        $notificationcount = NotificationCount::first();
        if($notificationcount == null){
            return '00';
        }
        else{
            return $notificationcount->count;
        }
    }
    public function NotificationCountSetZero(){
        // dd('fgh');
        $notificationcount = NotificationCount::first();
        $notificationcount = NotificationCount::find($notificationcount->id);
        $notificationcount->count = '0';
        $notificationcount->save();

        $this->seenNotification();
        
        
    }
    private function seenNotification(){
        $notifications = Notification::where('seen',0)->get();
        foreach($notifications as $notification){
            $seen = Notification::find($notification->id);
            $seen->seen = 1;
            $seen->save();
        }
    }








    
}
