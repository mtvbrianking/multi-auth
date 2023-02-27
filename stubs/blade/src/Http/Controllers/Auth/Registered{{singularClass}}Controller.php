<?php

namespace App\Modules\{{pluralClass}}\Http\Controllers\Auth;

use App\Modules\{{pluralClass}}\Http\Controllers\Controller;
use App\Modules\{{pluralClass}}\Models\{{singularClass}};
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class Registered{{singularClass}}Controller extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('{{singularSlug}}.auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.{{singularClass}}::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        ${{singularSlug}} = {{singularClass}}::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered(${{singularSlug}}));

        Auth::guard('{{singularSlug}}')->login(${{singularSlug}});

        return redirect('/{{singularSlug}}');
    }
}
