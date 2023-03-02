<?php

use App\Modules\{{pluralClass}}\Models\{{singularClass}};

test('users can authenticate using the login screen', function () {
    ${{singularCamel}} = {{singularClass}}::factory()->create();

    $response = $this->post('/{{singularSlug}}/login', [
        'email' => ${{singularCamel}}->email,
        'password' => 'password',
    ]);

    $this->assertAuthenticatedAs(${{singularCamel}}, '{{singularSlug}}');
    $response->assertNoContent();
});

test('users can not authenticate with invalid password', function () {
    ${{singularCamel}} = {{singularClass}}::factory()->create();

    $this->post('/{{singularSlug}}/login', [
        'email' => ${{singularCamel}}->email,
        'password' => 'wrong-password',
    ]);

    $this->assertGuest('{{singularSlug}}');
});
