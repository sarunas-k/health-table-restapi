<?php

use App\Http\Controllers\HealthRecordsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::post('/login', [ AuthController::class, 'login' ]);

Route::middleware('auth:sanctum')->group(function () {
    Route::controller(HealthRecordsController::class)->group(function () {
        Route::get('/rows', 'index');
        Route::get('/rows/{from}', 'find')->where(['from' => '[0-9]+']);
        Route::get('/rows/{from}/{length}', 'find')->where(['from' => '[0-9]+','length' => '[0-9]+']);
    });
});
