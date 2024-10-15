<?php

use App\Http\Controllers\Web\Admin\Admin\AdminController;
use Illuminate\Support\Facades\Route;

Route::prefix('admins')->name('admins.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('/create', [AdminController::class, 'create'])->name('create');
    Route::post('/create', [AdminController::class, 'store'])->name('store');
    Route::get('/show/{admin}', [AdminController::class, 'show'])->name('show');
    Route::post('/update/{admin}', [AdminController::class, 'update'])->name('update');
    Route::delete('/delete/{admin}', [AdminController::class, 'delete'])->name('delete');
});
