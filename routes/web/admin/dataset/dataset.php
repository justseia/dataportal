<?php

use App\Http\Controllers\Web\Admin\Dataset\DatasetController;
use Illuminate\Support\Facades\Route;

Route::prefix('datasets')->name('datasets.')->group(function () {
    Route::get('/', [DatasetController::class, 'index'])->name('index');
    Route::get('/show/{theme}', [DatasetController::class, 'show'])->name('show');
    Route::post('/update/{theme}', [DatasetController::class, 'update'])->name('update');
});
