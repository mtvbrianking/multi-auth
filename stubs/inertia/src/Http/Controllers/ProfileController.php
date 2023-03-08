<?php

namespace App\Modules\{{pluralClass}}\Http\Controllers;

use App\Modules\{{pluralClass}}\Http\Requests\ProfileUpdateRequest;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): Response
    {
        return Inertia::render('Profile/Edit', [
            'mustVerifyEmail' => $request->user('{{singularSlug}}') instanceof MustVerifyEmail,
            'status' => session('status'),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user('{{singularSlug}}')->fill($request->validated());

        if ($request->user('{{singularSlug}}')->isDirty('email')) {
            $request->user('{{singularSlug}}')->email_verified_at = null;
        }

        $request->user('{{singularSlug}}')->save();

        return Redirect::route('{{singularSlug}}.profile.edit');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'current-password:{{singularSlug}}'],
        ]);

        ${{singularCamel}} = $request->user('{{singularSlug}}');

        Auth::guard('{{singularSlug}}')->logout();

        ${{singularCamel}}->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/{{singularSlug}}');
    }
}
