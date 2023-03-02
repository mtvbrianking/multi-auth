<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_screen_can_be_rendered(): void
    {
        $response = $this->get('/{{singularSlug}}/register');

        $response->assertStatus(200);
    }

    public function test_new_{{pluralSlug}}_can_register(): void
    {
        $response = $this->post('/{{singularSlug}}/register', [
            'name' => 'Test {{singularClass}}',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect('/{{singularSlug}}');
    }
}
