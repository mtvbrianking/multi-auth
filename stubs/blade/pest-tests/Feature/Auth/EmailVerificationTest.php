<?php

use App\Modules\{{pluralClass}}\Models\{{singularClass}};
use App\Modules\{{pluralClass}}\Notifications\Auth\VerifyEmail;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\URL;

test('email verification screen can be rendered', function () {
    $verified{{singularClass}} = {{singularClass}}::factory()->create(['email_verified_at' => now()]);

    $response = $this->actingAs($verified{{singularClass}}, '{{singularSlug}}')->get('/{{singularSlug}}/verify-email');

    $response->assertRedirect('/{{singularSlug}}');

    // ...

    $nonVerified{{singularClass}} = {{singularClass}}::factory()->create(['email_verified_at' => null]);

    $response = $this->actingAs($nonVerified{{singularClass}}, '{{singularSlug}}')->get('/{{singularSlug}}/verify-email');

    $response->assertStatus(200);
});

test('email can be verified', function () {
    $nonVerified{{singularClass}} = {{singularClass}}::factory()->create(['email_verified_at' => null]);

    $verified{{singularClass}} = {{singularClass}}::factory()->create(['email_verified_at' => now()]);

    Event::fake();

    $verificationUrl = URL::temporarySignedRoute('{{singularSlug}}.verification.verify', now()->addMinutes(60), [
        'id' => $verified{{singularClass}}->id,
        'hash' => sha1($verified{{singularClass}}->email),
    ]);

    $response = $this->actingAs($verified{{singularClass}}, '{{singularSlug}}')->get($verificationUrl);

    Event::assertNotDispatched(Verified::class);

    $response->assertRedirect('/{{singularSlug}}?verified=1');

    // ...

    $verificationUrl = URL::temporarySignedRoute('{{singularSlug}}.verification.verify', now()->addMinutes(60), [
        'id' => $nonVerified{{singularClass}}->id,
        'hash' => sha1($nonVerified{{singularClass}}->email),
    ]);

    $response = $this->actingAs($nonVerified{{singularClass}}, '{{singularSlug}}')->get($verificationUrl);

    Event::assertDispatched(Verified::class);
    expect($nonVerified{{singularClass}}->fresh()->hasVerifiedEmail())->toBeTrue();
    $response->assertRedirect('/{{singularSlug}}?verified=1');
});

test('email is not verified with invalid hash', function () {
    ${{singularCamel}} = {{singularClass}}::factory()->create(['email_verified_at' => null]);

    $verificationUrl = URL::temporarySignedRoute('{{singularSlug}}.verification.verify', now()->addMinutes(60), [
        'id' => ${{singularCamel}}->id,
        'hash' => sha1('wrong-email'),
    ]);

    $this->actingAs(${{singularCamel}}, '{{singularSlug}}')->get($verificationUrl);

    expect(${{singularCamel}}->fresh()->hasVerifiedEmail())->toBeFalse();
});

test('resends email verification link', function () {
    $verified{{singularClass}} = {{singularClass}}::factory()->create(['email_verified_at' => now()]);

    $response = $this->actingAs($verified{{singularClass}}, '{{singularSlug}}')->post(route('{{singularSlug}}.verification.send'));

    $response->assertRedirect('/{{singularSlug}}');

    // ...

    Notification::fake();

    $nonVerified{{singularClass}} = {{singularClass}}::factory()->create(['email_verified_at' => null]);

    $response = $this->actingAs($nonVerified{{singularClass}}, '{{singularSlug}}')
        ->from(route('{{singularSlug}}.verification.notice'))
        ->post(route('{{singularSlug}}.verification.send'));

    Notification::assertSentTo($nonVerified{{singularClass}}, VerifyEmail::class);

    $response->assertRedirect(route('{{singularSlug}}.verification.notice'));
});
