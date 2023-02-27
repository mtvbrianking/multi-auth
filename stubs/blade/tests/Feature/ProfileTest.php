<?php

use App\Modules\{{pluralClass}}\Models\{{singularClass}};

test('profile page is displayed', function () {
    ${{singularSlug}} = {{singularClass}}::factory()->create();

    $response = $this
        ->actingAs(${{singularSlug}}, '{{singularSlug}}')
        ->get('/{{singularSlug}}/profile');

    $response->assertOk();
});

test('profile information can be updated', function () {
    ${{singularSlug}} = {{singularClass}}::factory()->create();

    $response = $this
        ->actingAs(${{singularSlug}}, '{{singularSlug}}')
        ->patch('/{{singularSlug}}/profile', [
            'name' => 'Test {{singularClass}}',
            'email' => '{{singularSlug}}@example.com',
        ]);

    $response
        ->assertSessionHasNoErrors()
        ->assertRedirect('/{{singularSlug}}/profile');

    ${{singularSlug}}->refresh();

    $this->assertSame('Test {{singularClass}}', ${{singularSlug}}->name);
    $this->assertSame('{{singularSlug}}@example.com', ${{singularSlug}}->email);
    $this->assertNull(${{singularSlug}}->email_verified_at);
});

test('email verification status is unchanged when the email address is unchanged', function () {
    ${{singularSlug}} = {{singularClass}}::factory()->create();

    $response = $this
        ->actingAs(${{singularSlug}}, '{{singularSlug}}')
        ->patch('/{{singularSlug}}/profile', [
            'name' => 'Test {{singularClass}}',
            'email' => ${{singularSlug}}->email,
        ]);

    $response
        ->assertSessionHasNoErrors()
        ->assertRedirect('/{{singularSlug}}/profile');

    $this->assertNotNull(${{singularSlug}}->refresh()->email_verified_at);
});

test('user can delete their account', function () {
    ${{singularSlug}} = {{singularClass}}::factory()->create();

    $response = $this
        ->actingAs(${{singularSlug}}, '{{singularSlug}}')
        ->delete('/{{singularSlug}}/profile', [
            'password' => 'password',
        ]);

    $response
        ->assertSessionHasNoErrors()
        ->assertRedirect('/{{singularSlug}}');

    $this->assertGuest();
    $this->assertNull(${{singularSlug}}->fresh());
});

test('correct password must be provided to delete account', function () {
    ${{singularSlug}} = {{singularClass}}::factory()->create();

    $response = $this
        ->actingAs(${{singularSlug}}, '{{singularSlug}}')
        ->from('/{{singularSlug}}/profile')
        ->delete('/{{singularSlug}}/profile', [
            'password' => 'wrong-password',
        ]);

    $response
        ->assertSessionHasErrorsIn('userDeletion', 'password')
        ->assertRedirect('/{{singularSlug}}/profile');

    $this->assertNotNull(${{singularSlug}}->fresh());
});
