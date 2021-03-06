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
use App\Http\Controllers\Api\CropPlagueController;

use App\Http\Controllers\Api\TerrainController;
use App\Http\Controllers\Api\PlantTypeController;

use App\Http\Controllers\Api\SoilTypeController;
use App\Http\Controllers\Api\ProductTypeController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ProductCompositionController;
use App\Http\Controllers\Api\PlantUptakeController;
use App\Http\Controllers\Api\PlantStageController;
use App\Http\Controllers\Api\PlantPlagueController;
use App\Http\Controllers\Api\PlagueTypeController; 
use App\Http\Controllers\Api\PlagueController;

use App\Http\Controllers\Api\AnalyseWaterController;
use App\Http\Controllers\Api\AnalyseSoilGuidelineController;
use App\Http\Controllers\Api\AnalyseSoilController;
use App\Http\Controllers\Api\AnalysePlantController;

use App\Http\Controllers\Api\AddressController;

use App\Http\Controllers\Api\DeviceController;
use App\Http\Controllers\Api\DeviceTypeController;

use App\Http\Controllers\Api\PlaguePlantsPartsAnatomyController;
use App\Http\Controllers\Api\PlantPartsAnatomyController;

use App\Http\Controllers\Api\DailyWeatherController;
use App\Http\Controllers\Api\CurrentWeatherController;

use App\Http\Controllers\Api\AirDataController;
use App\Http\Controllers\Api\SoilDataController;

use App\Http\Controllers\Api\HarvestController;

use App\Http\Controllers\Api\RecommendationFertilizerController;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });



// Route::group(['prefix' => 'auth:api'], function () {
Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [AuthController::class,'login'])->name('login')->middleware('api');
    Route::post('register', [AuthController::class,'register'])->name('register');
     
    Route::post('changePassword', [AuthController::class,'changePassword'])->name('changePassword')->middleware('auth:api');

    Route::get('current-user', [AuthController::class,'getCurrentUser'])->name('current-user')->middleware('auth:api');
    Route::delete('logout', [AuthController::class,'logout'])->name('logout')->middleware('auth:api');
});


Route::group(['prefix' => 'auth', 'as' => 'api.auth.'], function () {

 	Route::post('forgot', [ForgotPasswordController::class,'forgot'])->name('forgot');
    Route::post('reset', [ResetPasswordController::class,'reset'])->name('reset');
});

// Route::group(['middleware' => ['auth:api']], function () {
//  Auth::routes();
// });

Route::group(['middleware' => ['auth:api']], function() {
    Route::apiResources([
    'role' => RoleController::class,
    'user' => UserController::class,
    'company' => CompanyController::class,
    'farm' => FarmController::class,    
    'permission' => PermissionController::class,
    
    'plant' => PlantController::class,

    'crop' => CropController::class,
    'cropPlague' => CropPlagueController::class,
    
    'terrain' => TerrainController::class,
    'plantType' => PlantTypeController::class,
    'soilType' => SoilTypeController::class,
    'productType' => ProductTypeController::class,
    'product' => ProductController::class,
    'productComposition' => ProductCompositionController::class,
    'plantUptake' => PlantUptakeController::class,
    'plantStage' => PlantStageController::class,
    'plagueType' => PlagueTypeController::class,
    'plague' => PlagueController::class,
    'plantPlague' => PlantPlagueController::class,

    'analyseWater' => AnalyseWaterController::class,
    'analyseSoilGuideline' => AnalyseSoilGuidelineController::class,
    'analysePlant' => AnalysePlantController::class,
    'analyseSoil' => AnalyseSoilController::class,
    
    'address' => AddressController::class,

    'device' => DeviceController::class,
    'deviceType' => DeviceTypeController::class,

    'plaguePlantsPartsAnatomy' => PlaguePlantsPartsAnatomyController::class,
    'PlantPartsAnatomy' => PlantPartsAnatomyController::class,

    'dailyWeather' => DailyWeatherController::class,
    'currentWeather' => CurrentWeatherController::class,

    'airData' => AirDataController::class,
    'soilData' => SoilDataController::class,

    'harvest' => HarvestController::class,

        'recommendationFertilizer' => RecommendationFertilizerController::class,
    ]);


Route::post('plant/{id}/variety', [PlantController::class,'storeVariety']);
Route::patch('plant/{id}/variety', [PlantController::class,'updateVariety']);

Route::patch('user/{id}/blockUnblock', [UserController::class,'blockUnblock']);

Route::patch('device/{id}/enabledBlock', [DeviceController::class,'enabledBlock']);

Route::patch('device/{ref}/addToCompany/{company}', [DeviceController::class,'addToCompany']);
    
Route::get('airData/crop/{id}', [AirDataController::class,'getByCrop']);

Route::get('soilData/crop/{id}', [SoilDataController::class,'getByCrop']);

Route::patch('crop/{id}/finish', [CropController::class,'finishCrop']);

});
