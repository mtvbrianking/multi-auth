<?php

use App\Modules\{{pluralClass}}\Models\{{singularClass}};
use Illuminate\Support\Str;

test('login screen can be rendered', function () {
    $response = $this->get('/{{singularSlug}}/login');

    $response->assertStatus(200);

    // ...

    ${{singularCamel}} = {{singularClass}}::factory()->create(['email_verified_at' => now()]);

    $response = $this->actingAs(${{singularCamel}}, '{{singularSlug}}')->get(route('{{singularSlug}}.login'));

    $response->assertRedirect('/{{singularSlug}}');
});

test('users can authenticate using the login screen', function () {
    ${{singularCamel}} = {{singularClass}}::factory()->create();

    $response = $this->post('/{{singularSlug}}/login', [
        'email' => ${{singularCamel}}->email,
        'password' => 'password',
    ]);

    $this->assertAuthenticatedAs(${{singularCamel}}, '{{singularSlug}}');
    $response->assertRedirect('/{{singularSlug}}');
});

test('users can not authenticate with invalid password', function () {
    ${{singularCamel}} = {{singularClass}}::factory()->create();

    $this->post('/{{singularSlug}}/login', [
        'email' => ${{singularCamel}}->email,
        'password' => 'wrong-password',
    ]);

    $this->assertGuest('{{singularSlug}}');
});

test('can logout if authenticated', function () {
    ${{singularCamel}} = {{singularClass}}::factory()->create();

    $this->be(${{singularCamel}}, '{{singularSlug}}');

    $response = $this->post(route('{{singularSlug}}.logout'));

    $response->assertRedirect(route('{{singularSlug}}.dashboard'));
    $this->assertGuest('{{singularSlug}}');
});

test('can not make more than five failed login attempts a minute', function () {
    ${{singularCamel}} = {{singularClass}}::factory()->create();

    foreach (range(0, 5) as $_) {
        $response = $this->from(route('{{singularSlug}}.login'))->post(route('{{singularSlug}}.login'), [
            'email' => ${{singularCamel}}->email,
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
