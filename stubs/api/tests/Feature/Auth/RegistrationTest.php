<?php

use App\Modules\{{pluralClass}}\Models\{{singularClass}};

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_new_users_can_register(): void
    {
        $response = $this->post('/{{singularSlug}}/register', [
            'name' => 'Test {{singularClass}}',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $this->assertAuthenticatedAs({{singularClass}}::first(), '{{singularSlug}}');
        $response->assertNoContent();
    }
}
