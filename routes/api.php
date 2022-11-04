<?php

use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\DistrictController;
use App\Http\Controllers\Api\MukimController;
use App\Http\Controllers\Api\PostalCodeController;
use App\Http\Controllers\Api\VillageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
});
Route::controller(CustomerController::class)->group(function () {
    Route::get('/customers', 'index');
    Route::post('/customers', 'store');
    Route::get('/customers/{id}', 'show');
});
Route::controller(VillageController::class)->group(function () {
    Route::get('/autocomplete', 'autocomplete');
});

Route::controller(DistrictController::class)->group(function () {
    Route::get('/district', 'district');
});

Route::controller(PostalCodeController::class)->group(function () {
    Route::get('/postalcode', 'index');
    Route::get('/postalcode', 'postalcode');
});

Route::controller(MukimController::class)->group(function () {
    Route::get('/mukim', 'index');
    Route::get('/mukim', 'mukim');
});

// });
