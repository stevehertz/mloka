<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Shops\ShopController;


Route::prefix('shops')->name('shops.')->group(function () {
    Route::get('/{shop}', [ShopController::class, 'index'])->name('index');
    Route::get('/default', [ShopController::class, 'default'])->name('default');
    Route::get('/register', [ShopController::class, 'create'])->name('register');
    // Route::post('/register', [ShopController::class, 'store']);
});
