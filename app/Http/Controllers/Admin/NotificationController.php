<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Models\Notification;
use App\Models\KeyValue;
class NotificationController extends BaseController
{
    public function index(){
        $notifications = Notification::latest()->get();
        $notification = KeyValue::where('key','notification_count')->first();
        $this->setPageTitle('Notification', 'Notification');
        return view('/admin/notification/index' , compact('notifications' , 'notification'));
    }
    public function getNotificationCount(){

        $notificationcount = KeyValue::where('key','notification_count')->first();
        if($notificationcount == null){
            return '00';
        }
        else{
            return $notificationcount->value;
        }
    }
    public function NotificationCountSetZero(){
        // dd('fgh');
        $notificationcount = KeyValue::where('key','notification_count')->first();
        $notificationcount = KeyValue::find($notificationcount->id);
        $notificationcount->value = '0';
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



    public function sendNotification() {
        $userSchemas = User::where('auth_id',1)->get();

        $offerData = [
            'name' => 'BOGO',
            'body' => 'You received an offer.',
            'thanks' => 'Thank you',
            'offerText' => 'Check out the offer',
            'offerUrl' => url('/'),
            'offer_id' => 007
        ];
        foreach($userSchemas as $$userSchema){

        Notification::send($userSchema, new OffersNotification($offerData));
        }

        dd('Task completed!');
    }









}
