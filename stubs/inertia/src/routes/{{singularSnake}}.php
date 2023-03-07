<?php

use App\Modules\{{pluralClass}}\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::middleware(['{{singularSlug}}', '{{singularSlug}}.auth', '{{singularSlug}}.verified'])->get('/{{singularSlug}}', function () {
    return Inertia::render('Dashboard');
})->name('{{singularSlug}}.dashboard');

Route::group(['as' => '{{singularSlug}}.', 'prefix' => '/{{singularSlug}}', 'middleware' => ['{{singularSlug}}', '{{singularSlug}}.auth']], function () {
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
