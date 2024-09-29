<?php

use App\Http\Controllers\API\Client\Research\ResearchController;
use Illuminate\Support\Facades\Route;

Route::prefix('research')->name('research.')->group(function () {
    Route::get('/', [ResearchController::class, 'index'])->name('index');
    Route::get('/{theme}', [ResearchController::class, 'show'])->name('show');
});
