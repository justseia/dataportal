<?php

use Illuminate\Support\Facades\Route;

Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {

    Route::get('/', function () {
        return redirect()->route('admin.auth.index');
    })->name('index');

    include __DIR__ . '/auth/auth.php';
    include __DIR__ . '/dashboard/dashboard.php';
    include __DIR__ . '/client/client.php';
    include __DIR__ . '/news/news.php';
    include __DIR__ . '/report/report.php';
    include __DIR__ . '/dataset/dataset.php';
    include __DIR__ . '/admin/admin.php';
});
