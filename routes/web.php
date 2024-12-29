<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {

    Route::get('/home', function () {
        return view('dashboard');
    });

    Route::resource('/production', ProductionController::class);
    Route::resource('/category', CategoryController::class);
    Route::resource('/pruduct', ProductController::class);
    Route::resource('/user', UserController::class);
});
