<?php

namespace Tests\Feature\{{pluralClass}}\Auth;

use App\Modules\{{pluralClass}}\Models\{{singularClass}};
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class EmailVerificationTest extends TestCase
{
    use RefreshDatabase;

    public function test_email_can_be_verified(): void
    {
        ${{singularCamel}} = {{singularClass}}::factory()->create([
            'email_verified_at' => null,
        ]);

        Event::fake();

        $verificationUrl = URL::temporarySignedRoute(
            '{{singularSlug}}.verification.verify',
            now()->addMinutes(60),
            ['id' => ${{singularCamel}}->id, 'hash' => sha1(${{singularCamel}}->email)]
        );

        $response = $this->actingAs(${{singularCamel}}, '{{singularSlug}}')->get($verificationUrl);

        Event::assertDispatched(Verified::class);
        $this->assertTrue(${{singularCamel}}->fresh()->hasVerifiedEmail());
        $response->assertRedirect(config('app.frontend_url').'/{{singularSlug}}?verified=1');
    }

    public function test_email_is_not_verified_with_invalid_hash(): void
    {
        ${{singularCamel}} = {{singularClass}}::factory()->create([
            'email_verified_at' => null,
        ]);

        $verificationUrl = URL::temporarySignedRoute(
            '{{singularSlug}}.verification.verify',
            now()->addMinutes(60),
            ['id' => ${{singularCamel}}->id, 'hash' => sha1('wrong-email')]
        );

        $this->actingAs(${{singularCamel}}, '{{singularSlug}}')->get($verificationUrl);

        $this->assertFalse(${{singularCamel}}->fresh()->hasVerifiedEmail());
    }
}
