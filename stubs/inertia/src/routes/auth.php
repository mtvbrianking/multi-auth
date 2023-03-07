<?php

use App\Modules\{{pluralClass}}\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Modules\{{pluralClass}}\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Modules\{{pluralClass}}\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Modules\{{pluralClass}}\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Modules\{{pluralClass}}\Http\Controllers\Auth\NewPasswordController;
use App\Modules\{{pluralClass}}\Http\Controllers\Auth\PasswordController;
use App\Modules\{{pluralClass}}\Http\Controllers\Auth\PasswordResetLinkController;
use App\Modules\{{pluralClass}}\Http\Controllers\Auth\Registered{{singularClass}}Controller;
use App\Modules\{{pluralClass}}\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::group(['as' => '{{singularSlug}}.', 'prefix' => '/{{singularSlug}}', 'middleware' => ['{{singularSlug}}', '{{singularSlug}}.guest']], function () {
    Route::get('register', [Registered{{singularClass}}Controller::class, 'create'])
        ->name('register');

    Route::post('register', [Registered{{singularClass}}Controller::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

Route::group(['as' => '{{singularSlug}}.', 'prefix' => '/{{singularSlug}}', 'middleware' => ['{{singularSlug}}', '{{singularSlug}}.auth']], function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
