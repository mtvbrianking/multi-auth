<?php

namespace Tests\Feature\{{pluralClass}}\Auth;

use App\Modules\{{pluralClass}}\Models\{{singularClass}};
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_users_can_authenticate_using_the_login_screen(): void
    {
        ${{singularCamel}} = {{singularClass}}::factory()->create();

        $response = $this->post('/{{singularSlug}}/login', [
            'email' => ${{singularCamel}}->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticatedAs(${{singularCamel}}, '{{singularSlug}}');
        $response->assertNoContent();
    }

    public function test_users_can_not_authenticate_with_invalid_password(): void
    {
        ${{singularCamel}} = {{singularClass}}::factory()->create();

        $this->post('/{{singularSlug}}/login', [
            'email' => ${{singularCamel}}->email,
            'password' => 'wrong-password',
        ]);

        $this->assertGuest('{{singularSlug}}');
    }
}
