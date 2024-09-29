<?php

use App\Http\Controllers\API\Client\Map\MapController;
use Illuminate\Support\Facades\Route;

Route::prefix('map')->name('map.')->group(function () {
    Route::get('/themes', [MapController::class, 'themes'])->name('themes');
    Route::get('/questions/{theme}', [MapController::class, 'questions'])->name('questions');
    Route::get('/results/{question}', [MapController::class, 'result'])->name('result');
});
