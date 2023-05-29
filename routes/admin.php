<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FormDataController;
use App\Http\Controllers\Admin\PaymentStatusController;
use App\Http\Controllers\Admin\SearchController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\Admin\ExamDetailController;
use App\Http\Controllers\Admin\UserNotificationController;

use App\Http\Controllers;


Route::middleware(['adminlogin'])->group(function () {

    Route::group(['prefix'  =>  'admin'], function () {

        Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::group(['prefix'  =>  'formdata'], function () {

             Route::get('/', [FormDataController::class, 'index'])->name('admin.formdata.index');
        });

        Route::group(['prefix'  =>  'paymentstatus'], function () {

            Route::get('/', [PaymentStatusController::class, 'index'])->name('admin.paymentstatus.index');
            Route::post('/update', [PaymentStatusController::class, 'editStudent'])->name('admin.paymentstatus.update');
       });


       Route::group(['prefix'  =>  'notifications'], function () {

        Route::get('/', [UserNotificationController::class, 'index'])->name('admin.usernotification.index');
        Route::get('{id}/edit', [UserNotificationController::class, 'edit'])->name('admin.usernotification.edit');
        Route::post('/update', [UserNotificationController::class, 'update'])->name('admin.usernotification.update');
        Route::get('{id}/disable', [UserNotificationController::class, 'disable'])->name('admin.usernotification.disable');
        Route::get('/create', [UserNotificationController::class, 'create'])->name('admin.usernotification.create');
        Route::post('/store', [UserNotificationController::class, 'store'])->name('admin.usernotification.store');
   });

       Route::get('/changepassword',[ChangePasswordController::class , 'index'])->name('changepassword.view');
       Route::post('/changepassword',[ChangePasswordController::class , 'changePassword'])->name('changepassword');
    });

    Route::post('searchajaxform', [SearchController::class, 'formSearch'])->name('searchajaxform');
    Route::post('search', [SearchController::class, 'search'])->name('searchajax');
    Route::post('/changepaymentformstatus', [PaymentStatusController::class, 'changeFormStatus'])->name('changepaymentformstatus');
    Route::post('/changeapproveformstatus', [FormDataController::class, 'changeFormStatus'])->name('changeapproveformstatus');
    Route::post('/changeformpaymentstatus', [FormDataController::class, 'changeFormPaymentStatus'])->name('changeformpaymentstatus');


    Route::get('/notification', [NotificationController::class, 'index'])->name('notification');
    Route::get('/notificationcount', [NotificationController::class, 'getNotificationCount'])->name('notificationcount');
    Route::get('/notificationcountsetzero', [NotificationController::class, 'NotificationCountSetZero'])->name('notificationcountsetzero');


    Route::post('/upload/paymentstatus', [PaymentController::class, 'uploadPaymentStatus'])->name('upload.paymentstatus');
    Route::post('/seenform', [FormDataController::class, 'seenForm'])->name('seenform');
    Route::get('/form/{id}/view', [FormDataController::class, 'viewstudentdata'])->name('view.studentdata');
    Route::post('/changebarrier', [FormDataController::class, 'changeBarrier'])->name('admin.changebarrier');
    Route::post('/addbacksubject', [FormDataController::class, 'addBack'])->name('admin.addback');
    Route::post('/deletebacksubject', [FormDataController::class, 'removeBack'])->name('admin.removeback');


    Route::get('/getolddata', [FormDataController::class, 'getolddata'])->name('admin.oldform');


    Route::get('{title}/printdata', [FormDataController::class ,'printdata'])->name('printdata');
    Route::get('{program}/{batch}/export', [FormDataController::class ,'export'])->name('export');
    Route::get('{id}/editdata', [FormDataController::class ,'editdata'])->name('editdata');
    Route::post('import', 'ImportExportController@import')->name('import');



    Route::get('/paymentstatus/updatepaymentstatus', [PaymentStatusController::class, 'updatePaymentStatus'])->name('updatepaymentstatus');
    Route::get('/openclose/form', [PaymentStatusController::class, 'opencloseform'])->name('open.close.form');
    Route::get('/formdata/delete', [FormDataController::class, 'deleteAllData'])->name('deletefoemdata');


    Route::get('/examdetails', [ExamDetailController::class, 'index'])->name('exam.detail');
    Route::get('/triplicate', [ExamDetailController::class, 'triplicate'])->name('show.triplicate');


});
Route::get('/clear-cache', [DashboardController::class , 'clearCache'])->name('cache.clear');
Route::get('/send-notification', [NotificationController::class, 'sendNotification'])->name('send.notification');





