<?php

namespace Tests\Feature\{{pluralClass}}\Auth;

use App\Modules\{{pluralClass}}\Models\{{singularClass}};
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PasswordConfirmationTest extends TestCase
{
    use RefreshDatabase;

    public function test_confirm_password_screen_can_be_rendered(): void
    {
        ${{singularCamel}} = {{singularClass}}::factory()->create();

        $response = $this->actingAs(${{singularCamel}}, '{{singularSlug}}')->get('/{{singularSlug}}/confirm-password');

        $response->assertStatus(200);
    }

    public function test_password_can_be_confirmed(): void
    {
        ${{singularCamel}} = {{singularClass}}::factory()->create();

        $response = $this->actingAs(${{singularCamel}}, '{{singularSlug}}')->post('/{{singularSlug}}/confirm-password', [
            'password' => 'password',
        ]);

        $response->assertRedirect();
        $response->assertSessionHasNoErrors();
    }

    public function test_password_is_not_confirmed_with_invalid_password(): void
    {
        ${{singularCamel}} = {{singularClass}}::factory()->create();

        $response = $this->actingAs(${{singularCamel}}, '{{singularSlug}}')->post('/{{singularSlug}}/confirm-password', [
            'password' => 'wrong-password',
        ]);

        $response->assertSessionHasErrors();
    }
}
