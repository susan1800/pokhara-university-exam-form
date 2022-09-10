<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\RegisterController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\VerificationController;
use App\Http\Controllers\User\LogoutController;
use App\Http\Controllers\FormFillupController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\User\ForgotPasswordController;
use App\Http\Controllers\BarrierConcurrentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


require 'admin.php';

Route::get('/signin', function () {
    return view('login.signin');
})->name('signin');
Route::get('/signup', function () {
    return view('login.signup');
})->name('signup');
Route::get('/verifyotp', function () {
    return view('mail.verifyotp');
})->name('verifyotp');



Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/{email}/sendotp', [VerificationController::class, 'sendotp'])->name('sendotp');
Route::get('/{email}/sendotpforgotpassword', [VerificationController::class, 'sendotpforgotpassword'])->name('sendotp.forgotpassword');





Route::post('/checkotp', [VerificationController::class, 'checkotp'])->name('checkotp');

Route::get('/{email}/resendotp', [VerificationController::class, 'resendotp'])->name('resendotp');

Route::get('/userlogout', [LogoutController::class, 'userlogout'])->name('userlogout');
Route::get('/adminlogout', [LogoutController::class, 'adminlogout'])->name('adminlogout');


Route::get('/forgotpassword/email', [ForgotPasswordController::class, 'forgotPasswordEmail'])->name('forgotpassword.email');
Route::post('/password/email', [ForgotPasswordController::class, 'getEmail'])->name('password.email');


Route::post('/password/send/otp', [ForgotPasswordController::class, 'forgotPasswordSendOtp'])->name('forgotpassword.send.otp');

Route::middleware(['userlogin'])->group(function () {
    // Route:: view('/' , 'form.fillupform')->name('user');
    Route::get('/', [FormFillupController::class, 'index'])->name('user');
    Route::post('/getsubject', [SubjectController::class, 'getSubject'])->name('getsubject');
    // Route::post('/store', [FormFillupController::class, 'store'])->name('store');
    Route::post('/store', [FormFillupController::class, 'store'])->name('store');
    Route::get('/paymentmethod', [PaymentController::class, 'showPaymentMethod'])->name('payment.showpaymentmethod');
    Route::post('/selectConcurrentAndBackSubject', [BarrierConcurrentController::class, 'checkBarrierAndConcurrent'])->name('selectConcurrentAndBackSubject');
    Route::post('/removebacksubject', [BarrierConcurrentController::class, 'removeBackSubject'])->name('removebacksubject');
    Route::post('/checksubmitcredit', [FormFillupController::class, 'checkCredit'])->name('checksubmitcredit');



    // removebacksubject
});




