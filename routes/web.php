<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\BrandProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FormulaController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('/dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {

    // Route::get('/home', function () {
    //     return view('/dashboard');
    // });

    Route::resource('/production', ProductionController::class);
    Route::resource('/category', CategoryController::class);
    Route::resource('/product', ProductController::class);
    Route::resource('/user', UserController::class);
    Route::resource('/material', MaterialController::class);
    Route::post('/material/import-proses', [MaterialController::class, 'import_material'])->name('material.import-proses');
    Route::resource('/brand', BrandController::class);
    Route::resource('/formula', FormulaController::class);
    Route::post('/formula/{formula}', [FormulaController::class, 'punten'])->name('formula.punten');
    
});
