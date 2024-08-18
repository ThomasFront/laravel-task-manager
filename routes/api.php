<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:api');
    Route::post('refresh', [AuthController::class, 'refresh'])->middleware('auth:api');
    Route::get('me', [AuthController::class, 'me'])->middleware('auth:api');
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'tasks'
], function () {
    Route::get('', [TaskController::class, 'index'])->middleware('auth:api');
    Route::post('', [TaskController::class, 'store'])->middleware('auth:api');
    Route::get('{task}', [TaskController::class, 'show'])->middleware('auth:api');
    Route::delete('{task}', [TaskController::class, 'destroy'])->middleware('auth:api');
    Route::patch('{task}', [TaskController::class, 'update'])->middleware('auth:api');
    Route::patch('{task}/status', [TaskController::class, 'updateStatus'])->middleware('auth:api');
});

