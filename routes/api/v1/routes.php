<?php

use App\Api\V1\Controllers\Product\AllProductsController;
use App\Api\V1\Controllers\Product\OneProductController;
use Illuminate\Support\Facades\Route;

//
//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');

Route::get('/api/v1/products', AllProductsController::class)->name('api-v1-products');
Route::get('/api/v1/products/{id}', OneProductController::class)->name('api-v1-product');

