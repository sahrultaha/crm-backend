<?php

use App\Http\Controllers\Api\CountryController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\DistrictController;
use App\Http\Controllers\Api\FileController;
use App\Http\Controllers\Api\ImsiBulkController;
use App\Http\Controllers\Api\ImsiController;
use App\Http\Controllers\Api\MukimController;
use App\Http\Controllers\Api\NumberController;
use App\Http\Controllers\Api\PackController;
use App\Http\Controllers\Api\PostalCodeController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\SubscriptionController;
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
        Route::get('/customers/get', 'getCustomer');
        Route::put('/customers/update', 'update');
        Route::get('/customers/{id}', 'show');
        Route::delete('/customers/{customer}', 'destroy');
    });
    Route::controller(FileController::class)->group(function () {
        Route::post('/files', 'store');
        Route::patch('/files', 'update');
        Route::get('/files/{file}', 'show');
    });
    Route::controller(VillageController::class)->group(function () {
        Route::get('/autocomplete', 'autocomplete');
        Route::get('/district', 'district');
        Route::get('/village', 'index');
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
    Route::controller(ImsiBulkController::class)->group(function () {
        Route::get('/imsi/bulk', 'index');
    });
    Route::controller(ImsiController::class)->group(function () {
        Route::get('/imsi', 'index');
        Route::post('/imsi', 'store');
        Route::put('/imsi/{imsi}', 'update');
        Route::get('/imsi/{imsi}', 'show');
        Route::delete('/imsi/{imsi}', 'destroy');
    });

    Route::controller(PackController::class)->group(function () {
        Route::get('/packs', 'index');
        Route::post('/packs', 'store');
        Route::get('/packs/{pack}', 'show');
    });
    Route::controller(SubscriptionController::class)->group(function () {
        Route::get('/subscriptions', 'index');
        Route::post('/subscriptions', 'store');
        Route::get('/subscriptions/status', 'subscriptionStatus');
        Route::get('/subscriptions/{customer_id}', 'customerSubscriptions');
        Route::patch('/subscriptions/{subscription}', 'update');
    });
    Route::controller(ProductController::class)->group(function () {
        Route::get('/products', 'index');
    });
    Route::controller(CountryController::class)->group(function () {
        Route::get('/country', 'listCountry');
    });
    Route::controller(NumberController::class)->group(function () {
        Route::get('/msisdn', 'index');
        Route::post('/msisdn', 'store');
        Route::delete('/msisdn/{msisdn}', 'destroy');
    });
});
