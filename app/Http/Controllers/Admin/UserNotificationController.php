<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserNotification;
use App\Models\KeyValue;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Str;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
use Illuminate\Support\Facades\Storage;


class UserNotificationController extends BaseController
{
    public function index(){
        $notifications = UserNotification::latest()->get();
        $this->setPageTitle('Notification', 'Notification');
        return view('admin.notifications.index',compact('notifications'));
    }

    public function create(){
        $this->setPageTitle('Notification', 'Notification');
        return view('admin.notifications.create');
    }


    public function edit($id){
        $notification = UserNotification::find($id);
        $this->setPageTitle('Notification', 'Notification');
        return view('admin.notifications.edit',compact('notification'));
    }


    public function store(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'file' => 'required',
        ]);
        try{
            $create = new UserNotification();
            $create['title'] = $request->title;

            $filename = null;
            $uploadedFile = $request->file('file');
            $filename = time().Str::random(10).'.'. $uploadedFile->getClientOriginalExtension();

            Storage::disk('public')->putFileAs(
                'notification',
                $uploadedFile,
                $filename
            );
            $create['file'] = 'notification/'.$filename;
            $create->save();
            // return redirect()->route('admin.usernotification.index')->with('success' ,'Notification added Successfully!');
            return $this->responseRedirect('admin.usernotification.index','Notification added Successfully!', 'success', false, false);
        }catch (QueryException $exception) {
            // return redirect()-back()->with('success' ,'Notification added Successfully!')->withInput($request->input());
            return $this->responseRedirectBack('Something wrong please try again.', 'error', true, true)->withInput($request->input());
        }


    }



    public function update(Request $request){
        $this->validate($request, [
            'title' => 'required',
        ]);
        try{
            $update = UserNotification::find($request->id);
            $update['title'] = $request->title;

            if($request->file('file')){

            $filename = null;
            $uploadedFile = $request->file('file');
            $filename = time().Str::random(10).'.'. $uploadedFile->getClientOriginalExtension();

            Storage::disk('public')->putFileAs(
                'notification',
                $uploadedFile,
                $filename
            );
            $update['file'] = 'notification/'.$filename;
        }
        else{
            $update['file'] = $update->file;
        }

            $update->save();
            // return redirect()->route('admin.usernotification.index')->with('success' ,'Notification added Successfully!');
            return $this->responseRedirect('admin.usernotification.index','Notification added Successfully!', 'success', false, false);
        }catch (QueryException $exception) {
            // return redirect()-back()->with('success' ,'Notification added Successfully!')->withInput($request->input());
            return $this->responseRedirectBack('Something wrong please try again.', 'error', true, true)->withInput($request->input());
        }


    }




    public function disable($id){
        try{
            $disable = UserNotification::find($id);
            if($disable->status =='1'){
                $disable['status'] ='0';
            }else{
                $disable['status'] = '1';
            }
            $disable->save();
            return $this->responseRedirectBack('Update Successfully!', 'success', false, false);
        }catch (QueryException $exception) {
            // return redirect()-back()->with('success' ,'Notification added Successfully!')->withInput($request->input());
            return $this->responseRedirectBack('Something wrong please try again.', 'error', true, true)->withInput($request->input());
        }
    }
}
