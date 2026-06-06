<?php

use Illuminate\Support\Facades\Route;
use Plugins\inventory\Controllers\ProductController;

Route::prefix('inventory')->name('inventory.')->group(function () {

    Route::middleware('can:inventory.view')->group(function () {
        Route::get('products',           [ProductController::class, 'index'])->name('products.index');
        Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');
    });

    Route::middleware('can:inventory.manage')->group(function () {
        Route::get('products/create',           [ProductController::class, 'create'])->name('products.create');
        Route::post('products',                 [ProductController::class, 'store'])->name('products.store');
        Route::get('products/{product}/edit',   [ProductController::class, 'edit'])->name('products.edit');
        Route::put('products/{product}',        [ProductController::class, 'update'])->name('products.update');
        Route::delete('products/{product}',     [ProductController::class, 'destroy'])->name('products.destroy');
    });

});
