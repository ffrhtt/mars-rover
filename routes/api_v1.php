<?php

use App\Http\Controllers\V1\PlateauController;
use App\Http\Controllers\V1\RoverController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api_version" middleware group.
|
*/
Route::group(['middleware' => 'api_version:v1'], function () {
    /**
     * Plateau handlings
     */
    Route::post('/plateau/create', [PlateauController::class, 'create']);
    Route::get('/plateau/get', [PlateauController::class, 'get']);
    /**
     * Rover handlings
     */
    Route::post('/rover/create', [RoverController::class, 'create']);
    Route::post('/rover/sent/command', [RoverController::class, 'sendComand']);
    Route::get('/rover/get', [RoverController::class, 'get']);
    Route::get('/rover/get/state', [RoverController::class, 'getState']);
});