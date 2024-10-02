<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('themes.default.pages.home');
});

Route::get('/admin', function () {
    return view('admin-panel.pages.dashboard');
});





Route::resource('categories', CategoryController::class);
Route::resource('brands', BrandController::class);
