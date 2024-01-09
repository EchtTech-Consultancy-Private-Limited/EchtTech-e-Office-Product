<?php

use App\Http\Controllers\CaptchaValidationController;
use Illuminate\Support\Facades\Route;
use Modules\HRMS\app\Http\Controllers\Auth\ForgotPasswordController;
use Modules\HRMS\app\Http\Controllers\Auth\LoginController;
use Modules\HRMS\app\Http\Controllers\Auth\LogOutController;
use Modules\HRMS\app\Http\Controllers\Auth\OtpController;
use Modules\HRMS\app\Http\Controllers\Auth\ResetPasswordController;
use Modules\HRMS\app\Http\Controllers\Auth\VerificationController;
use Modules\HRMS\app\Http\Controllers\DashboardController;
use Modules\HRMS\app\Http\Controllers\Employee\EmployeeController;

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

Route::get('reload-captcha', [CaptchaValidationController::class, 'reloadCaptcha'])->name('reloadCaptcha');


Route::middleware('guest')->group(function () {
    Route::view('/', 'hrms::auth.login')->name('index');
});

Route::group(['prefix' => 'auth', 'as' => 'auth.'], function () {
    Route::post('/login',[LoginController::class,"login"])->name('login');
    Route::post('/password-login',[LoginController::class,"login"])->name('login-password-user');
    Route::get('/forget-password',[ForgotPasswordController::class,"forgetPassword"])->name('forget-password');
    Route::post('/forget-password',[ForgotPasswordController::class,"forgetPassword"])->name('forget-password');
    Route::post('submit-forget-password', [ForgotPasswordController::class, 'submitForgetPassword'])->name('submit-forget-password');
    Route::get('reset-password/{token}', [ResetPasswordController::class, 'resetPassword'])->name('reset-password');
    Route::post('/verify-otp',[VerificationController::class,"verifyOtp"])->name('verify-otp');
    Route::post('/resend-otp',[OtpController::class,"resendOtp"])->name('resend-otp');
});

Route::middleware('auth')->group(function (){
    Route::get('dashboard',[DashboardController::class,"index"]);

    //employee
    Route::get('employee',[EmployeeController::class,"create"])->name('employee.create');
    //departments

    // logout
    Route::post('/logout', [LogOutController::class, 'logout'])->name('auth.logout');
});

