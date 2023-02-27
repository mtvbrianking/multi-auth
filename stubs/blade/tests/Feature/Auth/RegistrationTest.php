<?php

use App\Modules\{{pluralClass}}\Models\{{singularClass}};

test('registration screen can be rendered', function () {
    $response = $this->get('/{{singularSlug}}/register');

    $response->assertStatus(200);
});

test('new users can register', function () {
    $response = $this->post('/{{singularSlug}}/register', [
        'name' => 'Test {{singularClass}}',
        'email' => 'test@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
    ]);

    $this->assertAuthenticatedAs({{singularClass}}::first(), '{{singularSlug}}');
    $response->assertRedirect('/{{singularSlug}}');
});
