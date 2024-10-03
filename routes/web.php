<?php

use App\Models\Slider;
use App\Models\Product;
use App\Models\Collection;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CollectionController;

Route::get('/', function () {
    return view('themes.default.pages.home');
});

Route::get('/admin', function () {
    return view('admin-panel.pages.dashboard');
});





Route::resource('categories', CategoryController::class);
Route::resource('brands', BrandController::class);
Route::resource('products', ProductController::class);
Route::resource('collections', CollectionController::class);
Route::resource('banners', BannerController::class);
Route::resource('sliders', SliderController::class);
