<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\Company\CompanyController;
use App\Http\Controllers\Admin\License\LicenseController;
use App\Http\Controllers\Admin\Role\RoleController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::middleware('guest:admin')->group(function () {
        Route::view('login', 'admin.auth.login')->name('login.form');
        Route::post('login', [AdminLoginController::class, "login"])->name('login');
    });

    Route::middleware('auth:admin')->group(function (){
        Route::get('dashboard',[AdminDashboardController::class,"index"])->name('dashboard');
        Route::resource('roles', RoleController::class);
        Route::get('get-roles',[RoleController::class,"getRoles"])->name('get-roles');
        Route::resource('companies', CompanyController::class);

        // License routes
        Route::post('generate-license',[LicenseController::class,"generate"]);
    });
});
