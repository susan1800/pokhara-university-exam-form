<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FormDataController;
use App\Http\Controllers\Admin\PaymentStatusController;
use App\Http\Controllers\Admin\SearchController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ChangePasswordController;

use App\Http\Controllers;

Route::middleware(['adminlogin'])->group(function () {

    Route::group(['prefix'  =>  'admin'], function () {

        Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::group(['prefix'  =>  'formdata'], function () {

             Route::get('/', [FormDataController::class, 'index'])->name('admin.formdata.index');
        });

        Route::group(['prefix'  =>  'paymentstatus'], function () {

            Route::get('/', [PaymentStatusController::class, 'index'])->name('admin.paymentstatus.index');
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

    Route::get('export', [FormDataController::class ,'export'])->name('export');
    Route::post('import', 'ImportExportController@import')->name('import');



    Route::get('/paymentstatus/updatepaymentstatus', [PaymentController::class, 'updatePaymentStatus'])->name('updatepaymentstatus');
    Route::get('/formdata/delete', [FormDataController::class, 'deleteAllData'])->name('deletefoemdata');




});
Route::get('/clear-cache', [DashboardController::class , 'clearCache'])->name('cache.clear');
Route::get('/send-notification', [NotificationController::class, 'sendNotification'])->name('send.notification');





