<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CalendarController;
use App\Http\Controllers\Api\ClientsController;
use App\Http\Controllers\Api\EligibilityController;
use Illuminate\Support\Facades\Route;

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


Route::post("signin",[AuthController::class,"signIn"]);
Route::post("signup",[AuthController::class,"signUp"]);
Route::get("calendar/events/get",[CalendarController::class,"getEvents"]);
Route::middleware('auth:api')->group(function(){

    Route::post("zoomlink",[EligibilityController::class,"createZoomMeeting"]);
    Route::post("savetest",[EligibilityController::class,"saveTest"]);
    Route::post("savemeeting",[EligibilityController::class,"saveMeeting"]);
    Route::post("sendmail",[EligibilityController::class,"sendMail"]);
    Route::prefix("axonaut")->group(function(){
        Route::post("company/add",[EligibilityController::class,"addCompany"]);
    });

    Route::get("clients/get",[ClientsController::class,"getClients"]);
    Route::post("savetimer",[EligibilityController::class,"saveTimer"]);
    
    Route::prefix("events")->group(function(){
        Route::get("get",[CalendarController::class,"getEvents"]);
        Route::delete("{id}",[CalendarController::class,"deleteEvent"]);
        Route::post("add",[CalendarController::class,"addEvent"]);
    });
});