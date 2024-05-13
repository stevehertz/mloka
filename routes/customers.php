<?php

use App\Http\Controllers\Customers\CustomerController;
use Illuminate\Support\Facades\Route;

Route::prefix('customers')->name('customers.')->group(function(){
    Route::get('/{shop}/index', [CustomerController::class, 'index'])->name('index');
    Route::post('/{shop}/store', [CustomerController::class, 'store'])->name('store');
    Route::get('/{id}/show', [CustomerController::class, 'show'])->name('show');
    Route::put('/{customer}/update', [CustomerController::class, 'update'])->name('update');
    Route::delete('/{customer}/delete', [CustomerController::class, 'destroy'])->name('delete');
    Route::get('/{shop}/import/file', [CustomerController::class, 'importFile'])->name('import.file');
    Route::post('/{shop}/import', [CustomerController::class, 'import'])->name('import');
});
