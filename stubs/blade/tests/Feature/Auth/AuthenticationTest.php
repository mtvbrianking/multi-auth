<?php

use App\Modules\{{pluralClass}}\Models\{{singularClass}};
use Illuminate\Support\Str;

test('login screen can be rendered', function () {
    $response = $this->get('/{{singularSlug}}/login');

    $response->assertStatus(200);

    // ...

    ${{singularSlug}} = {{singularClass}}::factory()->create(['email_verified_at' => now()]);

    $response = $this->actingAs(${{singularSlug}}, '{{singularSlug}}')->get(route('{{singularSlug}}.login'));

    $response->assertRedirect('/{{singularSlug}}');
});

test('users can authenticate using the login screen', function () {
    ${{singularSlug}} = {{singularClass}}::factory()->create();

    $response = $this->post('/{{singularSlug}}/login', [
        'email' => ${{singularSlug}}->email,
        'password' => 'password',
    ]);

    $this->assertAuthenticatedAs(${{singularSlug}}, '{{singularSlug}}');
    $response->assertRedirect('/{{singularSlug}}');
});

test('users can not authenticate with invalid password', function () {
    ${{singularSlug}} = {{singularClass}}::factory()->create();

    $this->post('/{{singularSlug}}/login', [
        'email' => ${{singularSlug}}->email,
        'password' => 'wrong-password',
    ]);

    $this->assertGuest('{{singularSlug}}');
});

test('can logout if authenticated', function () {
    ${{singularSlug}} = {{singularClass}}::factory()->create();

    $this->be(${{singularSlug}}, '{{singularSlug}}');

    $response = $this->post(route('{{singularSlug}}.logout'));

    $response->assertRedirect(route('{{singularSlug}}.dashboard'));
    $this->assertGuest('{{singularSlug}}');
});

test('can not make more than five failed login attempts a minute', function () {
    ${{singularSlug}} = {{singularClass}}::factory()->create();

    foreach (range(0, 5) as $_) {
        $response = $this->from(route('{{singularSlug}}.login'))->post(route('{{singularSlug}}.login'), [
            'email' => ${{singularSlug}}->email,
            'password' => Str::random(10),
        ]);
    }

    $response->assertRedirect(route('{{singularSlug}}.login'));
    $response->assertSessionHasErrors('email');
    static::assertStringContainsString(
        'Too many login attempts.',
        collect(
            $response
                ->baseResponse
                ->getSession()
                ->get('errors')
                ->getBag('default')
                ->get('email')
        )->first()
    );
    static::assertTrue(session()->hasOldInput('email'));
    static::assertFalse(session()->hasOldInput('password'));
    $this->assertGuest('{{singularSlug}}');
});
