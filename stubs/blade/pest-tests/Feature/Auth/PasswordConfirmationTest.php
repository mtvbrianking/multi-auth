<?php

use App\Modules\{{pluralClass}}\Models\{{singularClass}};

test('confirm password screen can be rendered', function () {
    ${{singularCamel}} = {{singularClass}}::factory()->create();

    $response = $this->actingAs(${{singularCamel}}, '{{singularSlug}}')->get('/{{singularSlug}}/confirm-password');

    $response->assertStatus(200);
});

test('password can be confirmed', function () {
    ${{singularCamel}} = {{singularClass}}::factory()->create();

    $response = $this->actingAs(${{singularCamel}}, '{{singularSlug}}')->post('/{{singularSlug}}/confirm-password', [
        'password' => 'password',
    ]);

    $response->assertRedirect();
    $response->assertSessionHasNoErrors();
});

test('password is not confirmed with invalid password', function () {
    ${{singularCamel}} = {{singularClass}}::factory()->create();

    $response = $this->actingAs(${{singularCamel}}, '{{singularSlug}}')->post('/{{singularSlug}}/confirm-password', [
        'password' => 'wrong-password',
    ]);

    $response->assertSessionHasErrors();
});
