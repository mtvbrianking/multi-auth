<?php

use App\Modules\{{pluralClass}}\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Modules\{{pluralClass}}\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Modules\{{pluralClass}}\Http\Controllers\Auth\NewPasswordController;
use App\Modules\{{pluralClass}}\Http\Controllers\Auth\PasswordResetLinkController;
use App\Modules\{{pluralClass}}\Http\Controllers\Auth\Registered{{singularClass}}Controller;
use App\Modules\{{pluralClass}}\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::post('/{{singularSlug}}/register', [Registered{{singularClass}}Controller::class, 'store'])
    ->middleware(['web', '{{singularSlug}}.guest'])
    ->name('{{singularSlug}}.register');

Route::post('/{{singularSlug}}/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware(['web', '{{singularSlug}}.guest'])
    ->name('{{singularSlug}}.login');

Route::post('/{{singularSlug}}/forgot-password', [PasswordResetLinkController::class, 'store'])
    ->middleware(['web', '{{singularSlug}}.guest'])
    ->name('{{singularSlug}}.password.email');

Route::post('/{{singularSlug}}/reset-password', [NewPasswordController::class, 'store'])
    ->middleware(['web', '{{singularSlug}}.guest'])
    ->name('{{singularSlug}}.password.store');

Route::get('/{{singularSlug}}/verify-email/{id}/{hash}', VerifyEmailController::class)
    ->middleware(['web', '{{singularSlug}}.auth', 'signed', 'throttle:6,1'])
    ->name('{{singularSlug}}.verification.verify');

Route::post('/{{singularSlug}}/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    ->middleware(['web', '{{singularSlug}}.auth', 'throttle:6,1'])
    ->name('{{singularSlug}}.verification.send');

Route::post('/{{singularSlug}}/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware(['web', '{{singularSlug}}.auth'])
    ->name('{{singularSlug}}.logout');
