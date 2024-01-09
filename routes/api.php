<?php

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

Route::group(['prefix' => '/v1'], function () {

    Route::apiResource('/users', \App\Http\Controllers\Api\V1\UserController::class);

    Route::post('/login', [\App\Http\Controllers\Api\V1\UserController::class, 'login']);

    Route::post('/addsenior', [\App\Http\Controllers\Api\V1\UserController::class, 'addSenior']);

    Route::get('/getSeniors', [\App\Http\Controllers\Api\V1\UserController::class, 'getSeniors']);

    Route::post('/addHealthData', [\App\Http\Controllers\Api\V1\UserController::class, 'addHealthData']);

    Route::get('/getHealthData', [\App\Http\Controllers\Api\V1\UserController::class, 'getHealthData']);

});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


