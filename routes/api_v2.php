<?php

use App\Http\Controllers\V2\TestController;
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
Route::group(['middleware' => 'api_version:v2'], function () {
    /**
     * Testing to apiversion 2
     */
    Route::get('/test', [TestController::class, 'index']);
});