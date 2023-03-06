<?php

namespace Tests\Feature\{{pluralClass}}\Auth;

use App\Modules\{{pluralClass}}\Models\{{singularClass}};
use App\Modules\{{pluralClass}}\Notifications\Auth\ResetPassword;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class PasswordResetTest extends TestCase
{
    use RefreshDatabase;

    public function test_reset_password_link_can_be_requested(): void
    {
        Notification::fake();

        ${{singularCamel}} = {{singularClass}}::factory()->create();

        $this->post('/{{singularSlug}}/forgot-password', ['email' => ${{singularCamel}}->email]);

        Notification::assertSentTo(${{singularCamel}}, ResetPassword::class);
    }

    public function test_password_can_be_reset_with_valid_token(): void
    {
        Notification::fake();

        ${{singularCamel}} = {{singularClass}}::factory()->create();

        $this->post('/{{singularSlug}}/forgot-password', ['email' => ${{singularCamel}}->email]);

        Notification::assertSentTo(${{singularCamel}}, ResetPassword::class, function (object $notification) use (${{singularCamel}}) {
            $response = $this->post('/{{singularSlug}}/reset-password', [
                'token' => $notification->token,
                'email' => ${{singularCamel}}->email,
                'password' => 'password',
                'password_confirmation' => 'password',
            ]);

            $response->assertSessionHasNoErrors();

            return true;
        });
    }
}
