<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.dashboard');
});
Route::resource('production', ProductionController::class);
Route::resource('category', CategoryController::class);
Route::resource('pruduct', ProductController::class);