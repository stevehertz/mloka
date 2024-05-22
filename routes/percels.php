<?php

use App\Http\Controllers\Percels\PercelController;
use Illuminate\Support\Facades\Route;

Route::prefix('percels')->name('percels.')->group(function(){
    Route::get('/{shop}', [PercelController::class, 'index'])->name('index');
    Route::get('/{shop}/send/percel', [PercelController::class, 'sendPercel'])->name('send.percel');
    Route::post('/{shop}/send/percel', [PercelController::class, 'send']);
});