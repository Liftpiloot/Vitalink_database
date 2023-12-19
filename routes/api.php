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

Route::apiResource('/v1/tasks', TaskController::class);

Route::patch('/v1/tasks/{task}/complete', [CompleteTaskController::class, 'complete']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

