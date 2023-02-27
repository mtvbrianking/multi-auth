<?php

use App\Modules\{{pluralClass}}\Models\{{singularClass}};

test('confirm password screen can be rendered', function () {
    ${{singularSlug}} = {{singularClass}}::factory()->create();

    $response = $this->actingAs(${{singularSlug}}, '{{singularSlug}}')->get('/{{singularSlug}}/confirm-password');

    $response->assertStatus(200);
});

test('password can be confirmed', function () {
    ${{singularSlug}} = {{singularClass}}::factory()->create();

    $response = $this->actingAs(${{singularSlug}}, '{{singularSlug}}')->post('/{{singularSlug}}/confirm-password', [
        'password' => 'password',
    ]);

    $response->assertRedirect();
    $response->assertSessionHasNoErrors();
});

test('password is not confirmed with invalid password', function () {
    ${{singularSlug}} = {{singularClass}}::factory()->create();

    $response = $this->actingAs(${{singularSlug}}, '{{singularSlug}}')->post('/{{singularSlug}}/confirm-password', [
        'password' => 'wrong-password',
    ]);

    $response->assertSessionHasErrors();
});
