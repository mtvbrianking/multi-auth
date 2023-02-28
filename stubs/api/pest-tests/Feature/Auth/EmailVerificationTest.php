<?php

use App\Modules\Admins\Models\Admin;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\URL;

test('email can be verified', function () {
    $admin = Admin::factory()->create([
        'email_verified_at' => null,
    ]);

    Event::fake();

    $verificationUrl = URL::temporarySignedRoute(
        'admin.verification.verify',
        now()->addMinutes(60),
        ['id' => $admin->id, 'hash' => sha1($admin->email)]
    );

    $response = $this->actingAs($admin, 'admin')->get($verificationUrl);

    Event::assertDispatched(Verified::class);
    expect($admin->fresh()->hasVerifiedEmail())->toBeTrue();
    $response->assertRedirect(config('app.frontend_url') . '/admin?verified=1');
});

test('email is not verified with invalid hash', function () {
    $admin = Admin::factory()->create([
        'email_verified_at' => null,
    ]);

    $verificationUrl = URL::temporarySignedRoute(
        'admin.verification.verify',
        now()->addMinutes(60),
        ['id' => $admin->id, 'hash' => sha1('wrong-email')]
    );

    $this->actingAs($admin, 'admin')->get($verificationUrl);

    expect($admin->fresh()->hasVerifiedEmail())->toBeFalse();
});
