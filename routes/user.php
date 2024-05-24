<?php

use App\Http\Controllers\User\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('profile')->name('profile.')->group(function () {
    Route::get('/{shop}', [ProfileController::class, 'index'])->name('index');
    Route::post('/{shop}', [ProfileController::class, 'update']);
});
