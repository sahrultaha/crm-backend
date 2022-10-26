<?php

use App\Http\Controllers\Api\CustomerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::controller(CustomerController::class)->group(function () {
        Route::post('/customers', 'store');
    });
    Route::controller(CustomerController::class)->group(function () {
        Route::get('/customers/{id}', 'show');
    });
});
