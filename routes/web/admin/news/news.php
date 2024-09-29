<?php

use App\Http\Controllers\Web\Admin\News\NewsController;
use Illuminate\Support\Facades\Route;

Route::prefix('news')->name('news.')->group(function () {
    Route::get('/', [NewsController::class, 'index'])->name('index');
    Route::get('/create', [NewsController::class, 'create'])->name('create');
    Route::post('/create', [NewsController::class, 'store'])->name('store');
    Route::get('/show/{news}', [NewsController::class, 'show'])->name('show');
    Route::post('/update/{news}', [NewsController::class, 'update'])->name('update');
});
