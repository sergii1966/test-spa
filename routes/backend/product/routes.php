<?php

use App\Http\Controllers\Backend\Product\AddNameDescriptionProductController;
use App\Http\Controllers\Backend\Product\AddPricesProductController;
use App\Http\Controllers\Backend\Product\AddProductController;
use App\Http\Controllers\Backend\Product\AddStatusProductController;
use App\Http\Controllers\Backend\Product\AllProductsController;
use App\Http\Controllers\Backend\Product\EditProductController;
use App\Http\Controllers\Backend\Product\Image\AddImageProductController;
use App\Http\Controllers\Backend\Product\Image\DelImageProductController;
use App\Http\Controllers\Backend\Product\Image\EditImageProductController;
use App\Http\Controllers\Backend\Product\OneProductController;
use Illuminate\Support\Facades\Route;


Route::get('/all-products', AllProductsController::class)->name('all-products-backend');
Route::get('/one-product/{id}', OneProductController::class)->name('one-product-backend');
Route::get('/add-product', AddProductController::class)->name('add-product-backend');
Route::get('/edit-product/{id}', EditProductController::class)->name('edit-product-backend');

Route::post('/add-name-description-product', AddNameDescriptionProductController::class)->name(
    'add-name-description-product-backend'
);
Route::post('/add-status-product', AddStatusProductController::class)->name('add-status-product-backend');
Route::post('/add-prices-product', AddPricesProductController::class)->name('add-prices-product-backend');
Route::post('/add-image-product', AddImageProductController::class)->name('add-image-product-backend');
Route::post('/edit-image-product', EditImageProductController::class)
    ->name('edit-image-product-backend');
Route::post('/del-image-product', DelImageProductController::class)
    ->name('del-image-product-backend');
