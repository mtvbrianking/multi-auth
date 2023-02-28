<?php

use Illuminate\Support\Facades\Route;

Route::get('/admin', function () {
    return ['Laravel' => app()->version()];
})->name('admin.home');

require __DIR__ . '/auth.php';
