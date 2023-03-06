<?php

namespace Tests\Feature\{{pluralClass}}\Auth;

use App\Modules\{{pluralClass}}\Models\{{singularClass}};
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class PasswordUpdateTest extends TestCase
{
    use RefreshDatabase;

    public function test_password_can_be_updated(): void
    {
        ${{singularCamel}} = {{singularClass}}::factory()->create();

        $response = $this
            ->actingAs(${{singularCamel}}, '{{singularSlug}}')
            ->from('/{{singularSlug}}/profile')
            ->put('/{{singularSlug}}/password', [
                'current_password' => 'password',
                'password' => 'new-password',
                'password_confirmation' => 'new-password',
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/{{singularSlug}}/profile');

        $this->assertTrue(Hash::check('new-password', ${{singularCamel}}->refresh()->password));
    }

    public function test_correct_password_must_be_provided_to_update_password(): void
    {
        ${{singularCamel}} = {{singularClass}}::factory()->create();

        $response = $this
            ->actingAs(${{singularCamel}}, '{{singularSlug}}')
            ->from('/{{singularSlug}}/profile')
            ->put('/{{singularSlug}}/password', [
                'current_password' => 'wrong-password',
                'password' => 'new-password',
                'password_confirmation' => 'new-password',
            ]);

        $response
            ->assertSessionHasErrorsIn('updatePassword', 'current_password')
            ->assertRedirect('/{{singularSlug}}/profile');
    }
}
