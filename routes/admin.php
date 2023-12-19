<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminLoginController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::middleware('guest')->group(function () {
        Route::view('login', 'admin.auth.login')->name('login.form');
        Route::post('login', [AdminLoginController::class, "login"])->name('login');
    });

    Route::middleware('auth')->group(function (){
        Route::get('dashboard',[AdminDashboardController::class,"index"])->name('dashboard');
    });
});
