<?php

use App\Modules\Admins\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Modules\Admins\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Modules\Admins\Http\Controllers\Auth\NewPasswordController;
use App\Modules\Admins\Http\Controllers\Auth\PasswordResetLinkController;
use App\Modules\Admins\Http\Controllers\Auth\RegisteredAdminController;
use App\Modules\Admins\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::post('/admin/register', [RegisteredAdminController::class, 'store'])
    ->middleware(['web', 'admin.guest'])
    ->name('admin.register');

Route::post('/admin/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware(['web', 'admin.guest'])
    ->name('admin.login');

Route::post('/admin/forgot-password', [PasswordResetLinkController::class, 'store'])
    ->middleware(['web', 'admin.guest'])
    ->name('admin.password.email');

Route::post('/admin/reset-password', [NewPasswordController::class, 'store'])
    ->middleware(['web', 'admin.guest'])
    ->name('admin.password.store');

Route::get('/admin/verify-email/{id}/{hash}', VerifyEmailController::class)
    ->middleware(['web', 'admin.auth', 'signed', 'throttle:6,1'])
    ->name('admin.verification.verify');

Route::post('/admin/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    ->middleware(['web', 'admin.auth', 'throttle:6,1'])
    ->name('admin.verification.send');

Route::post('/admin/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware(['web', 'admin.auth'])
    ->name('admin.logout');
