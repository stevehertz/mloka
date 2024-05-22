<?php

use App\Http\Controllers\Products\ProductController;
use Illuminate\Support\Facades\Route;

Route::prefix('products')->name('products.')->group(function(){
    Route::get('/{shop}', [ProductController::class, 'index'])->name('index');
    Route::post('/{shop}/store', [ProductController::class, 'store'])->name('store');
    Route::get('/{id}/show', [ProductController::class, 'show'])->name('show');
    Route::put('/{product}/update', [ProductController::class, 'update'])->name('update');
    Route::delete('/{product}/delete', [ProductController::class, 'destroy'])->name('delete');
    Route::post('/{shop}/import', [ProductController::class, 'import'])->name('import');
});