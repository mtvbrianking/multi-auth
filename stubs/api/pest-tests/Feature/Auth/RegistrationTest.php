<?php

use App\Modules\{{pluralClass}}\Models\{{singularClass}};

test('new {{pluralSlug}} can register', function () {
    $response = $this->post('/{{singularSlug}}/register', [
        'name' => 'Test {{singularClass}}',
        'email' => 'test@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
    ]);

    $this->assertAuthenticatedAs({{singularClass}}::first(), '{{singularSlug}}');
    $response->assertNoContent();
});
