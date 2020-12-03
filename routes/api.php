<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\FarmController;
use App\Http\Controllers\Api\PlantController;
use App\Http\Controllers\Api\CropController;
use App\Http\Controllers\Api\TerrainController;
use App\Http\Controllers\Api\PlantTypeController;



use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [AuthController::class,'login'])->name('login');
    Route::post('register', [AuthController::class,'register'])->name('register');
    Route::get('current-user', [AuthController::class,'getCurrentUser'])->name('current-user')->middleware('auth:api');
    Route::delete('logout', [AuthController::class,'logout'])->name('logout')->middleware('auth:api');
});


Route::group(['prefix' => 'auth', 'as' => 'api.auth.'], function () {

 	Route::post('forgot', [ForgotPasswordController::class,'forgot'])->name('forgot');
    Route::post('reset', [ResetPasswordController::class,'reset'])->name('reset');
});



Route::group(['middleware' => ['auth:api']], function() {
    Route::resources([
    'roles' => RoleController::class,
    'users' => UserController::class,
    'companys' => CompanyController::class,
    'permissions' => PermissionController::class,
    'farm' => FarmController::class,
    'plant' => PlantController::class,
    'crop' => CropController::class,
    'terrain' => TerrainController::class,
    'plantType' => PlantTypeController::class,
    // Route::resource('roles','RoleController');
    // Route::resource('users','UserController');
    // Route::resource('companys','CompanyController');
    ]);
});
