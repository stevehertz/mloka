<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\Settings\SettingsController;
use App\Http\Controllers\Shops\ShopController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PagesController::class, 'index']);
Auth::routes();
Route::get('/{shop}/dashboard', [DashboardController::class, 'index'])->name('dashboard');


Route::prefix('shops')->name('shops.')->group(function(){
    Route::get('/register', [ShopController::class, 'create'])->name('register');
    Route::post('/register', [ShopController::class, 'store']);
    Route::post('/{shop}/add/shop', [ShopController::class, 'addShop'])->name('add.shop');
    Route::delete('/{shop}/delete', [ShopController::class, 'destroy'])->name('delete');
});

Route::prefix('settings')->name('settings.')->group(function(){
    Route::get('/{shop}', [SettingsController::class, 'index'])->name('index');
    Route::put('/{shop}', [SettingsController::class, 'update']);
});