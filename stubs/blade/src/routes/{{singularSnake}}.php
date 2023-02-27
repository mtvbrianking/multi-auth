<?php

use App\Modules\{{pluralClass}}\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware(['web', '{{singularSlug}}.auth', '{{singularSlug}}.verified'])->get('/{{singularSlug}}', function () {
    return view('{{singularSlug}}.dashboard');
})->name('{{singularSlug}}.dashboard');

Route::group(['as' => '{{singularSlug}}.', 'prefix' => '/{{singularSlug}}', 'middleware' => ['web', '{{singularSlug}}.auth']], function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
