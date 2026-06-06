<?php

use Illuminate\Support\Facades\Route;
use Plugins\inventory\Controllers\ProductController;

Route::prefix('inventory')->name('inventory.')->group(function () {
    Route::get('products',                  [ProductController::class, 'index'])->name('products.index')->middleware('can:inventory.view');
    Route::get('products/create',           [ProductController::class, 'create'])->name('products.create')->middleware('can:inventory.manage');
    Route::post('products',                 [ProductController::class, 'store'])->name('products.store')->middleware('can:inventory.manage');
    Route::get('products/{product}',        [ProductController::class, 'show'])->name('products.show')->middleware('can:inventory.view');
    Route::get('products/{product}/edit',   [ProductController::class, 'edit'])->name('products.edit')->middleware('can:inventory.manage');
    Route::put('products/{product}',        [ProductController::class, 'update'])->name('products.update')->middleware('can:inventory.manage');
    Route::delete('products/{product}',     [ProductController::class, 'destroy'])->name('products.destroy')->middleware('can:inventory.manage');
});
