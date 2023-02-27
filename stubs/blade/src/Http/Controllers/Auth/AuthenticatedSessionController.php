<?php

namespace App\Modules\{{pluralClass}}\Http\Controllers\Auth;

use App\Modules\{{pluralClass}}\Http\Controllers\Controller;
use App\Modules\{{pluralClass}}\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('{{singularSlug}}.auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended('/{{singularSlug}}');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('{{singularSlug}}')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('{{singularSlug}}.dashboard');
    }
}
