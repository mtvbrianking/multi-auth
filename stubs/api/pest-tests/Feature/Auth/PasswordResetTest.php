<?php

use App\Modules\Admins\Models\Admin;
use App\Modules\Admins\Notifications\Auth\ResetPassword;
use Illuminate\Support\Facades\Notification;

test('reset password link can be requested', function () {
    Notification::fake();

    $admin = Admin::factory()->create();

    $this->post('/admin/forgot-password', ['email' => $admin->email]);

    Notification::assertSentTo($admin, ResetPassword::class);
});

test('password can be reset with valid token', function () {
    Notification::fake();

    $admin = Admin::factory()->create();

    $this->post('/admin/forgot-password', ['email' => $admin->email]);

    Notification::assertSentTo($admin, ResetPassword::class, function (object $notification) use ($admin) {
        $response = $this->post('/admin/reset-password', [
            'token' => $notification->token,
            'email' => $admin->email,
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertSessionHasNoErrors();

        return true;
    });
});
