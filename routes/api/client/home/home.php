<?php

use App\Http\Controllers\API\Client\Home\HomeController;
use Illuminate\Support\Facades\Route;

//Route::middleware('auth:sanctum')->name('theme.')->group(function () {
Route::prefix('home')->name('home.')->group(function () {
    Route::get('/search', [HomeController::class, 'search'])->name('search');
});
