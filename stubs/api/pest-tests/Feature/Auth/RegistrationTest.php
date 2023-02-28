<?php

use App\Modules\Admins\Models\Admin;

test('new admins can register', function () {
    $response = $this->post('/admin/register', [
        'name' => 'Test Admin',
        'email' => 'test@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
    ]);

    $this->assertAuthenticatedAs(Admin::first(), 'admin');
    $response->assertNoContent();
});
