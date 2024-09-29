<?php

use App\Http\Controllers\API\Client\FAQ\FAQController;
use Illuminate\Support\Facades\Route;

Route::prefix('faq')->name('faq.')->group(function () {
    Route::get('/', [FAQController::class, 'index'])->name('index');
});
