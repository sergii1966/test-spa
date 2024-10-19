<?php

use App\Http\Controllers\Backend\Main\MainAdminController;
use Illuminate\Support\Facades\Route;

Route::group(
    [
        'prefix' => 'admin'
    ],
    function () {
        Route::get('/', MainAdminController::class)->name('main-backend');
        require 'product/routes.php';
    }
);
