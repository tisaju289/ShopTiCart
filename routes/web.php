<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin-panel.components.dashboard-content');
});
