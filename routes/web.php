<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\CaptchaValidationController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Auth\LogOutController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\OtpController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Eoffice\DashboardController;

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
Auth::routes();

Route::get('/', [FrontendController::class, 'index'])->name('index')->middleware('guest:admin');
Route::get('reload-captcha', [CaptchaValidationController::class, 'reloadCaptcha'])->name('reloadCaptcha');

// Authentication for superAdmin
Route::group(['prefix' => 'auth', 'as' => 'auth.'],function(){
    Route::get('admin-login',[AdminLoginController::class,'login'])->name('loginAdmin');
    Route::post('submit-login', [AdminLoginController::class, 'submitLogin'])->name('submitLogin');
});
// Authentication for superAdmin

// Authentication Routes
Route::group(['prefix' => 'auth', 'as' => 'auth.'], function () {
    Route::post('login', [LoginController::class, 'login'])->name('loginUser');
    Route::post('password-login', [LoginController::class, 'login'])->name('loginPassworsUser');
    Route::post('verify-otp', [VerificationController::class, 'verifyOtp'])->name('verifyOtp');
    Route::post('resend-otp', [OtpController::class, 'resendOtp'])->name('resendOtp');
    Route::any('check-forgot-password', [ForgotPasswordController::class, 'checkForgotPassword'])->name('checkForgotPassword');
    Route::post('submit-forget-password', [ForgotPasswordController::class, 'submitForgetPassword'])->name('submitForgetPassword');
    Route::get('forget-password', [ForgotPasswordController::class, 'forgetPassword'])->name('forgetPassword');
    Route::get('reset-password/{token}', [ResetPasswordController::class, 'resetPassword'])->name('resetPassword');
    Route::post('password-reset', [ResetPasswordController::class, 'submitResetPasswordForm'])->name('passwordResetSubmit');

    Route::post('/logout', [LogOutController::class, 'logout'])->name('logout');
});

Route::group(['middleware' => ['auth:admin']], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
