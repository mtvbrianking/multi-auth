<?php

namespace App\Modules\{{pluralClass}}\Http\Controllers\Auth;

use App\Modules\{{pluralClass}}\Http\Controllers\Controller;
use App\Modules\{{pluralClass}}\Models\{{singularClass}};
use App\Modules\{{pluralClass}}\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;

class Registered{{singularClass}}Controller extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:'.{{singularClass}}::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        ${{singularCamel}} = {{singularClass}}::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered(${{singularCamel}}));

        Auth::login(${{singularCamel}});

        return redirect('/{{singularSlug}}');
    }
}
