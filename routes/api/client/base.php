<?php

use Illuminate\Support\Facades\Route;

include __DIR__ . '/auth/auth.php';

//Route::middleware(['auth:sanctum', 'check.close.all.content', 'action.log.activity'])->name('api.')->group(function () {
Route::middleware(['check.close.all.content', 'action.log.activity'])->name('api.')->group(function () {

    include __DIR__ . '/home/home.php';
    include __DIR__ . '/online-analyze/online-analyze.php';
    include __DIR__ . '/research/research.php';
    include __DIR__ . '/map/map.php';
    include __DIR__ . '/news/news.php';
    include __DIR__ . '/faq/faq.php';
    include __DIR__ . '/client-type/client-type.php';
    include __DIR__ . '/profile/profile.php';

});
