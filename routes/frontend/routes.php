<?php
use Illuminate\Support\Facades\Route;

Route::get('/{vue_capture?}', function () {
    return view('frontend.app');
})->where('vue_capture', '[\/\w\.-]*');
