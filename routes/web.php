<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\PagesController;
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
});