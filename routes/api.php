<?php

use App\Http\Controllers\Api\V1\TaskController;
use App\Http\Controllers\Api\V1\CompleteTaskController;
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
    Route::apiResource('/tasks', TaskController::class);

    Route::patch('/tasks/{task}/complete', [CompleteTaskController::class, 'complete']);

    Route::apiResource('/users', \App\Http\Controllers\Api\V1\UserController::class);

    Route::get('/users/showByEmailAndPassword', [\App\Http\Controllers\Api\V1\UserController::class, 'showByEmailAndPassword']);

});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


