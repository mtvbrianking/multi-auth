<?php

use App\Modules\{{pluralClass}}\Models\{{singularClass}};
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\URL;

test('email can be verified', function () {
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
    expect(${{singularCamel}}->fresh()->hasVerifiedEmail())->toBeTrue();
    $response->assertRedirect(config('app.frontend_url') . '/{{singularSlug}}?verified=1');
});

test('email is not verified with invalid hash', function () {
    ${{singularCamel}} = {{singularClass}}::factory()->create([
        'email_verified_at' => null,
    ]);

    $verificationUrl = URL::temporarySignedRoute(
        '{{singularSlug}}.verification.verify',
        now()->addMinutes(60),
        ['id' => ${{singularCamel}}->id, 'hash' => sha1('wrong-email')]
    );

    $this->actingAs(${{singularCamel}}, '{{singularSlug}}')->get($verificationUrl);

    expect(${{singularCamel}}->fresh()->hasVerifiedEmail())->toBeFalse();
});
