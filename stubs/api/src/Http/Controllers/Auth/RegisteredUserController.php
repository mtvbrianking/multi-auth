<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Modules\{{pluralClass}}\Models\{{singularClass}};
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class Registered{{singularClass}}Controller extends Controller
{
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): Response
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.{{singularClass}}::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        ${{singularCamel}} = {{singularClass}}::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered(${{singularCamel}}));

        Auth::login(${{singularCamel}});

        return response()->noContent();
    }
}
