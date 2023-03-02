<?php

namespace Tests\Feature;

use App\Modules\{{pluralClass}}\Models\{{singularClass}};
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    use RefreshDatabase;

    public function test_profile_page_is_displayed(): void
    {
        ${{singularCamel}} = {{singularClass}}::factory()->create();

        $response = $this
            ->actingAs(${{singularCamel}}, '{{singularSlug}}')
            ->get('/{{singularSlug}}/profile');

        $response->assertOk();
    }

    public function test_profile_information_can_be_updated(): void
    {
        ${{singularCamel}} = {{singularClass}}::factory()->create();

        $response = $this
            ->actingAs(${{singularCamel}}, '{{singularSlug}}')
            ->patch('/{{singularSlug}}/profile', [
                'name' => 'Test {{singularClass}}',
                'email' => 'test@example.com',
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/{{singularSlug}}/profile');

        ${{singularCamel}}->refresh();

        $this->assertSame('Test {{singularClass}}', ${{singularCamel}}->name);
        $this->assertSame('test@example.com', ${{singularCamel}}->email);
        $this->assertNull(${{singularCamel}}->email_verified_at);
    }

    public function test_email_verification_status_is_unchanged_when_the_email_address_is_unchanged(): void
    {
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
    }

    public function test_{{singularSlug}}_can_delete_their_account(): void
    {
        ${{singularCamel}} = {{singularClass}}::factory()->create();

        $response = $this
            ->actingAs(${{singularCamel}}, '{{singularSlug}}')
            ->delete('/{{singularSlug}}/profile', [
                'password' => 'password',
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/{{singularSlug}}/');

        $this->assertGuest('{{singularSlug}}');
        $this->assertNull(${{singularCamel}}->fresh());
    }

    public function test_correct_password_must_be_provided_to_delete_account(): void
    {
        ${{singularCamel}} = {{singularClass}}::factory()->create();

        $response = $this
            ->actingAs(${{singularCamel}}, '{{singularSlug}}')
            ->from('/{{singularSlug}}/profile')
            ->delete('/{{singularSlug}}/profile', [
                'password' => 'wrong-password',
            ]);

        $response
            ->assertSessionHasErrorsIn('{{singularSlug}}Deletion', 'password')
            ->assertRedirect('/{{singularSlug}}/profile');

        $this->assertNotNull(${{singularCamel}}->fresh());
    }
}
