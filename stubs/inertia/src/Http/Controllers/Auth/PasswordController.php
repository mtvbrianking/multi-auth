<?php

namespace App\Modules\{{pluralClass}}\Http\Controllers\Auth;

use App\Modules\{{pluralClass}}\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        $request->user('{{singularSlug}}')->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back();
    }
}
