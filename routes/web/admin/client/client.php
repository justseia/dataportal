<?php

use App\Http\Controllers\Web\Admin\Client\ClientController;
use Illuminate\Support\Facades\Route;

Route::prefix('clients')->name('clients.')->group(function () {
    Route::get('/', [ClientController::class, 'index'])->name('index');
    Route::get('/create', [ClientController::class, 'create'])->name('create');
    Route::post('/create', [ClientController::class, 'store'])->name('store');
    Route::get('/show/{client}', [ClientController::class, 'show'])->name('show');
    Route::post('/update/{client}', [ClientController::class, 'update'])->name('update');
});
