<?php

use App\Modules\{{pluralClass}}\Models\{{singularClass}};
use App\Modules\{{pluralClass}}\Notifications\Auth\ResetPassword;
use Illuminate\Support\Facades\Notification;

test('reset password link screen can be rendered', function () {
    $response = $this->get('/{{singularSlug}}/forgot-password');

    $response->assertStatus(200);
});

test('reset password link can be requested', function () {
    Notification::fake();

    ${{singularCamel}} = {{singularClass}}::factory()->create();

    $this->post('/{{singularSlug}}/forgot-password', ['email' => ${{singularCamel}}->email]);

    Notification::assertSentTo(${{singularCamel}}, ResetPassword::class);
});

test('reset password screen can be rendered', function () {
    Notification::fake();

    ${{singularCamel}} = {{singularClass}}::factory()->create();

    $this->post('/{{singularSlug}}/forgot-password', ['email' => ${{singularCamel}}->email]);

    Notification::assertSentTo(${{singularCamel}}, ResetPassword::class, function ($notification) {
        $response = $this->get('/{{singularSlug}}/reset-password/'.$notification->token);

        $response->assertStatus(200);

        return true;
    });
});

test('password can be reset with valid token', function () {
    Notification::fake();

    ${{singularCamel}} = {{singularClass}}::factory()->create();

    $this->post('/{{singularSlug}}/forgot-password', ['email' => ${{singularCamel}}->email]);

    Notification::assertSentTo(${{singularCamel}}, ResetPassword::class, function ($notification) use (${{singularCamel}}) {
        $response = $this->post('/{{singularSlug}}/reset-password', [
            'token' => $notification->token,
            'email' => ${{singularCamel}}->email,
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertSessionHasNoErrors();

        return true;
    });
});
