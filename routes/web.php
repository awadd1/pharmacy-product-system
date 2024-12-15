<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PharmacyController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('products.index'); 
    Route::get('/create', [ProductController::class, 'create'])->name('products.create'); 
    Route::post('/', [ProductController::class, 'store'])->name('products.store'); 
    Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('products.edit'); 
    Route::put('/{id}', [ProductController::class, 'update'])->name('products.update'); 
    Route::delete('/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::get('/search', [ProductController::class, 'search'])->name('products.search');
    Route::get('/{id}', [ProductController::class, 'show'])->name('products.show');
});

Route::prefix('pharmacies')->group(function () {
    Route::get('/', [PharmacyController::class, 'index'])->name('pharmacies.index'); 
    Route::get('/create', [PharmacyController::class, 'create'])->name('pharmacies.create');
    Route::post('/', [PharmacyController::class, 'store'])->name('pharmacies.store'); 
    Route::get('/{id}/edit', [PharmacyController::class, 'edit'])->name('pharmacies.edit');
    Route::put('/{id}', [PharmacyController::class, 'update'])->name('pharmacies.update');
    Route::delete('/{id}', [PharmacyController::class, 'destroy'])->name('pharmacies.destroy'); 
    Route::get('/{id}', [PharmacyController::class, 'show'])->name('pharmacies.show');
});

Route::prefix('api')->group(function () {
    Route::get('products', [App\Http\Controllers\Api\ProductController::class, 'index']); 
Route::post('products', [App\Http\Controllers\Api\ProductController::class, 'store']); 
Route::put('products/{id}', [App\Http\Controllers\Api\ProductController::class, 'update']); 
Route::delete('products/{id}', [App\Http\Controllers\Api\ProductController::class, 'destroy']); 
  
Route::get('pharmacies', [App\Http\Controllers\Api\PharmacyController::class, 'index']); 
Route::post('pharmacies', [App\Http\Controllers\Api\PharmacyController::class, 'store']); 
Route::put('pharmacies/{id}', [App\Http\Controllers\Api\PharmacyController::class, 'update']); 
Route::delete('pharmacies/{id}', [App\Http\Controllers\Api\PharmacyController::class, 'destroy']); 

Route::get('search-products', [App\Http\Controllers\Api\ProductController::class, 'search']); 
});