<?php

use App\Modules\{{pluralClass}}\Models\{{singularClass}};

test('profile page is displayed', function () {
    ${{singularCamel}} = {{singularClass}}::factory()->create();

    $response = $this
        ->actingAs(${{singularCamel}}, '{{singularSlug}}')
        ->get('/{{singularSlug}}/profile');

    $response->assertOk();
});

test('profile information can be updated', function () {
    ${{singularCamel}} = {{singularClass}}::factory()->create();

    $response = $this
        ->actingAs(${{singularCamel}}, '{{singularSlug}}')
        ->patch('/{{singularSlug}}/profile', [
            'name' => 'Test {{singularClass}}',
            'email' => '{{singularSlug}}@example.com',
        ]);

    $response
        ->assertSessionHasNoErrors()
        ->assertRedirect('/{{singularSlug}}/profile');

    ${{singularCamel}}->refresh();

    $this->assertSame('Test {{singularClass}}', ${{singularCamel}}->name);
    $this->assertSame('{{singularSlug}}@example.com', ${{singularCamel}}->email);
    $this->assertNull(${{singularCamel}}->email_verified_at);
});

test('email verification status is unchanged when the email address is unchanged', function () {
    ${{singularCamel}} = {{singularClass}}::factory()->create();

    $response = $this
        ->actingAs(${{singularCamel}}, '{{singularSlug}}')
        ->patch('/{{singularSlug}}/profile', [
            'name' => 'Test {{singularClass}}',
            'email' => ${{singularCamel}}->email,
        ]);

    $response
        ->assertSessionHasNoErrors()
        ->assertRedirect('/{{singularSlug}}/profile');

    $this->assertNotNull(${{singularCamel}}->refresh()->email_verified_at);
});

test('user can delete their account', function () {
    ${{singularCamel}} = {{singularClass}}::factory()->create();

    $response = $this
        ->actingAs(${{singularCamel}}, '{{singularSlug}}')
        ->delete('/{{singularSlug}}/profile', [
            'password' => 'password',
        ]);

    $response
        ->assertSessionHasNoErrors()
        ->assertRedirect('/{{singularSlug}}');

    $this->assertGuest();
    $this->assertNull(${{singularCamel}}->fresh());
});

test('correct password must be provided to delete account', function () {
    ${{singularCamel}} = {{singularClass}}::factory()->create();

    $response = $this
        ->actingAs(${{singularCamel}}, '{{singularSlug}}')
        ->from('/{{singularSlug}}/profile')
        ->delete('/{{singularSlug}}/profile', [
            'password' => 'wrong-password',
        ]);

    $response
        ->assertSessionHasErrorsIn('userDeletion', 'password')
        ->assertRedirect('/{{singularSlug}}/profile');

    $this->assertNotNull(${{singularCamel}}->fresh());
});
