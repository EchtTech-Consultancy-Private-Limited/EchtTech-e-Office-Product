<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\Ajax\ValidationsController;
use App\Http\Controllers\Admin\Auth\LogoutController;
use App\Http\Controllers\Admin\Company\CompanyController;
use App\Http\Controllers\Admin\Department\DepartmentController;
use App\Http\Controllers\Admin\Designation\DesignationController;
use App\Http\Controllers\Admin\Employee\EmployeeController;
use App\Http\Controllers\Admin\Employee\EmploymentTypeController;
use App\Http\Controllers\Admin\License\LicenseController;
use App\Http\Controllers\Admin\Module\ModuleController;
use App\Http\Controllers\Admin\Role\RoleController;
use Illuminate\Support\Facades\Route;

//Admin Routes

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::middleware('guest:admin')->group(function () {
        Route::view('login', 'admin.auth.login')->name('login.form');
        Route::post('login', [AdminLoginController::class, "login"])->name('login');
    });

    Route::middleware('auth:admin')->group(function (){
        //profile routes
        Route::view('profile','admin.profile.index')->name('profile');
        Route::get('dashboard',[AdminDashboardController::class,"index"])->name('dashboard');
        Route::resource('roles', RoleController::class);
        Route::get('get-roles',[RoleController::class,"getRoles"])->name('get-roles');

        // Company routes
        Route::resource('companies', CompanyController::class);
        Route::get('companies-list',[CompanyController::class,"companiesList"]);

        // License routes
        Route::post('generate-license',[LicenseController::class,"generate"]);
        Route::post('license-assign',[LicenseController::class,"assignLicense"]);
        Route::post('generate-username',[CompanyController::class,"generateUsername"]);
        Route::post('save_db_details',[CompanyController::class,"saveDatabase"]);
        Route::post('save_companies_basic_details',[CompanyController::class,"saveBasicDetails"]);
        Route::post('save-business-details',[CompanyController::class,"saveBusinessDetails"]);
        Route::post('save-company-contact-details',[CompanyController::class,"saveContactDetails"]);
        // Module routes
        Route::post('save_selected_modules',[ModuleController::class,"assignModuleToCompany"]);
        // store company with user information
        Route::post('bind_user_with_company',[CompanyController::class,"assignCompanyToUser"]);

        // validations routes
        Route::post('check_email_and_user_name',[ValidationsController::class,"check_email_and_username"]);

        //Department routes
        Route::resource('departments', DepartmentController::class);
        Route::get('departments-list', [DepartmentController::class,"departmentsList"]);

        //Designation routes
        Route::resource('designations', DesignationController::class);
        Route::get('designation-list', [DesignationController::class,"designationList"]);

        //Employee routes
        Route::get('employment-types',[EmploymentTypeController::class,"index"])->name('employment-types.index');
        Route::get('employees/create',[EmployeeController::class,"create"])->name('employees.create');

        // admin logout route
        Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
    });
});





