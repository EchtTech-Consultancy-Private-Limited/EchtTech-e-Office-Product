<?php

use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\Company\CompanyController;
use App\Http\Controllers\Admin\Module\ModuleController;
use App\Http\Controllers\AjaxOperationsController;
use App\Http\Controllers\Eoffice\Auth\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('admin/login', [AdminLoginController::class, "login"])->name('login');
Route::middleware(['auth:sanctum'])->prefix('admin')->group(function () {
    // Module routes
    Route::get('modules', [ModuleController::class,'index']);
    Route::post('modules/create', [ModuleController::class,'store'])->name('api.admin.module.store');

    // companies routes
    Route::get('companies', [CompanyController::class,"index"]);

    // Admin profile routes
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});


// eoffice users routes
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// e-office routes
Route::post('login',[LoginController::class,"login"]);


Route::get('get-countries',[AjaxOperationsController::class,"getCountries"]);
Route::get('get-states',[AjaxOperationsController::class,"getStates"]);
Route::get('get-cities',[AjaxOperationsController::class,"getCities"]);
