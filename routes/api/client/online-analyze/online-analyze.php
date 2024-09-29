<?php

use App\Http\Controllers\API\Client\OnlineAnalyze\OnlineAnalyzeController;
use Illuminate\Support\Facades\Route;

Route::prefix('online-analyze')->name('online-analyze.')->group(function () {
    Route::get('/themes/{yearId}', [OnlineAnalyzeController::class, 'themes'])->name('themes');
    Route::get('/questions/{id}', [OnlineAnalyzeController::class, 'questions'])->name('questions');
    Route::get('/result/{questionId}', [OnlineAnalyzeController::class, 'result'])->name('result');
    Route::get('/cross/{questionFirst}/{questionSecond}', [OnlineAnalyzeController::class, 'cross'])->name('cross');
});
