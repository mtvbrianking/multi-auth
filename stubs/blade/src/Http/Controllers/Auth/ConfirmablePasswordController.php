<?php

namespace App\Modules\{{pluralClass}}\Http\Controllers\Auth;

use App\Modules\{{pluralClass}}\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class ConfirmablePasswordController extends Controller
{
    /**
     * Show the confirm password view.
     */
    public function show(): View
    {
        return view('{{singularSlug}}.auth.confirm-password');
    }

    /**
     * Confirm the {{singularSlug}}'s password.
     */
    public function store(Request $request): RedirectResponse
    {
        if (! Auth::guard('{{singularSlug}}')->validate([
            'email' => $request->user('{{singularSlug}}')->email,
            'password' => $request->password,
        ])) {
            throw ValidationException::withMessages([
                'password' => __('auth.password'),
            ]);
        }

        $request->session()->put('{{singularSlug}}.auth.password_confirmed_at', time());

        return redirect()->intended('/{{singularSlug}}');
    }
}
