<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Models\KeyValue;
use Illuminate\Http\Request;

class ExamDetailController extends BaseController
{
    public function index(){

    $notification = KeyValue::where('key','notification_count')->first();
    $spring_fall = KeyValue::where('key','spring_fall')->first();
    $open = KeyValue::where('key','open')->first();
    $this->setPageTitle('Exam Details', 'Exam Details');
        return view('admin.examdetail', compact('notification','open','spring_fall'));
    }
}
