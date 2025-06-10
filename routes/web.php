<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::name('product.')->group(function () {
    Route::get('/product/{id}', [ProductController::class, 'show'])->name('show');
    Route::post('/product', [ProductController::class, 'store'])->name('store');    
    Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('edit');
    Route::put('/product/{id}', [ProductController::class, 'update'])->name('update');    
    Route::delete('/product/destroy/{id}', [ProductController::class, 'destroy'])->name('destroy');    
});

Route::name('order.')->group(function () {
    Route::post('/order/store', [OrderController::class, 'store'])->name('store');
    Route::get('/order/{id}', [OrderController::class, 'show'])->name('show');
    Route::put('/order/{id}', [OrderController::class, 'update'])->name('update');
});
