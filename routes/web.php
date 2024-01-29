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


Route::view('/', 'admin.auth.login')->name('admin.login.form.index');

//Admin Routes
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::middleware('guest:admin')->group(function () {
        Route::view('login', 'admin.auth.login')->name('login.form');
        Route::post('login', [AdminLoginController::class, "loginWeb"])->name('login');
    });

    Route::middleware('admin.auth')->group(function (){
        //profile routes
        Route::view('profile','admin.profile.index')->name('profile');
        Route::get('/',[AdminDashboardController::class,"index"])->name('dashboard');
        Route::get('dashboard',[AdminDashboardController::class,"index"]);
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
        Route::get('modules',[ModuleController::class,"index"])->name('modules.index');
        Route::view('modules/create','admin.modules.create')->name('modules.create');
        Route::post('save_selected_modules',[ModuleController::class,"assignModuleToCompany"]);
        // store company with user information
        Route::post('bind_user_with_company',[CompanyController::class,"assignCompanyToUser"]);

        // validations routes
        Route::post('check_email_and_user_name',[ValidationsController::class,"check_email_and_username"]);
        Route::post('check_company_phone_email',[ValidationsController::class,"check_company_phone_email_duplicate"]);

        //Department routes
        Route::resource('departments', DepartmentController::class);
        Route::get('departments-list', [DepartmentController::class,"departmentsList"]);

        //Designation routes
        Route::resource('designations', DesignationController::class);
        Route::get('designation-list', [DesignationController::class,"designationList"]);

        // admin logout route
        Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
    });
});





