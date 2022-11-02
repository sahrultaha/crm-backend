<?php

use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\DistrictController;
use App\Http\Controllers\Api\FileController;
use App\Http\Controllers\Api\MukimController;
use App\Http\Controllers\Api\VillageController;
use App\Http\Controllers\Api\VillageController;
use App\Http\Controllers\Api\DistrictController;
use App\Http\Controllers\Api\MukimController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::controller(CustomerController::class)->group(function () {
        Route::get('/customers', 'index');
        Route::post('/customers', 'store');
        Route::get('/customers/{id}', 'show');
    });
    Route::controller(VillageController::class)->group(function () {
        Route::get('/village', 'index');
        Route::get('/village', 'show');
        Route::get('/autocomplete', 'autocomplete');
    });

Route::controller(DistrictController::class)->group(function () {
    Route::get('/district', 'index');
    Route::get('/district', 'district');
});

// });
