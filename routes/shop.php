<?php

use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;


Route::prefix('shops')->name('shops.')->group(function(){
    Route::get('/', [ShopController::class, 'index'])->name('index');
    Route::get('/register', [ShopController::class, 'create'])->name('register');
    Route::post('/register', [ShopController::class, 'store']);
});