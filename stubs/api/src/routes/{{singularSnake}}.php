<?php

use Illuminate\Support\Facades\Route;

Route::get('/{{singularSlug}}', function () {
    return ['Laravel' => app()->version()];
})->name('{{singularSlug}}.home');

require __DIR__ . '/auth.php';
