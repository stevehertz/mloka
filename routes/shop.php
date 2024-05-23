<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Shops\ShopController;

/*
|--------------------------------------------------------------------------
| Shop Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('shops')->name('shops.')->group(function(){
    Route::get('/default', [ShopController::class, 'default'])->name('default');
    Route::get('/{shop}', [ShopController::class, 'index'])->name('index');
    Route::get('/test-error', [ShopController::class, 'test_error']);
});
