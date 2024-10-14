<?php

use App\Http\Controllers\Backend\Product\AddImageProductAdminController;
use App\Http\Controllers\Backend\Product\AddNameDescriptionProductAdminController;
use App\Http\Controllers\Backend\Product\AddPricesProductAdminController;
use App\Http\Controllers\Backend\Product\AddProductAdminController;
use App\Http\Controllers\Backend\Product\AddStatusProductAdminController;
use App\Http\Controllers\Backend\Product\AllProductsAdminController;
use App\Http\Controllers\Backend\Product\MainAdminController;
use App\Http\Controllers\Backend\Product\OneProductAdminController;
use Illuminate\Support\Facades\Route;

Route::group(
    [
        'prefix' => 'f03'
    ],
    function () {
        Route::get('/', MainAdminController::class)->name('main-backend');
        Route::get('/all-products', AllProductsAdminController::class)->name('all-products-backend');
        Route::get('/one-product/{id}', OneProductAdminController::class)->name('one-product-backend');
        Route::get('/add-product', AddProductAdminController::class)->name('add-product-backend');
        Route::post('/add-name-description-product', AddNameDescriptionProductAdminController::class)->name('add-name-description-product-backend');
        Route::post('/add-status-product', AddStatusProductAdminController::class)->name('add-status-product-backend');
        Route::post('/add-prices-product', AddPricesProductAdminController::class)->name('add-prices-product-backend');
        Route::post('/add-image-product', AddImageProductAdminController::class)->name('add-image-product-backend');
    }
);
