<?php

use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\DistrictController;
use App\Http\Controllers\Api\FileController;
use App\Http\Controllers\Api\MukimController;
use App\Http\Controllers\Api\PostalCodeController;
use App\Http\Controllers\Api\VillageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::controller(CustomerController::class)->group(function () {
        Route::get('/customers', 'index');
        Route::post('/customers', 'store');
        Route::get('/customers/search', 'checkIc');
        Route::get('/customers/{id}', 'show');
        Route::delete('/customers/{customer}', 'destroy');
    });
    Route::controller(FileController::class)->group(function () {
        Route::post('/files', 'store');
        Route::get('/files/{file}', 'show');
    });
    Route::controller(VillageController::class)->group(function () {
        Route::get('/autocomplete', 'autocomplete');
    });
    Route::controller(DistrictController::class)->group(function () {
        Route::get('/district', 'district');
    });
    Route::controller(MukimController::class)->group(function () {
        Route::get('/mukim', 'mukim');
    });
    Route::controller(PostalCodeController::class)->group(function () {
        Route::get('/postalcode', 'postalcode');
    });
});
