<?php

use App\Http\Controllers\API\Client\ClientType\ClientTypeController;
use Illuminate\Support\Facades\Route;

Route::prefix('client-type')->name('client-type.')->group(function () {
    Route::get('/', [ClientTypeController::class, 'index'])->name('index');
});
