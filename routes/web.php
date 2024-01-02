<?php

use App\Http\Controllers\Auth\LogOutController;
use App\Http\Controllers\Auth\ResetPasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CaptchaValidationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\OtpController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\VerificationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Other user routes

Route::get('reload-captcha', [CaptchaValidationController::class, 'reloadCaptcha'])->name('reloadCaptcha');

Route::middleware('guest')->group(function () {
    Route::view('/','auth.login')->name('index');
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
});

Route::post('/logout', [LogOutController::class, 'logout'])->name('auth.logout');


//Admin Routes
include __DIR__.'/admin.php';





