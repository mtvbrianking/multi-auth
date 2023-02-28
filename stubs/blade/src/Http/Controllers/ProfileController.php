<?php

namespace App\Modules\{{pluralClass}}\Http\Controllers;

use App\Modules\{{pluralClass}}\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the {{singularSlug}}'s profile form.
     */
    public function edit(Request $request): View
    {
        return view('{{singularSlug}}.profile.edit', [
            'user' => $request->user('{{singularSlug}}'),
        ]);
    }

    /**
     * Update the {{singularSlug}}'s profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user('{{singularSlug}}')->fill($request->validated());

        if ($request->user('{{singularSlug}}')->isDirty('email')) {
            $request->user('{{singularSlug}}')->email_verified_at = null;
        }

        $request->user('{{singularSlug}}')->save();

        return Redirect::route('{{singularSlug}}.profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the {{singularSlug}}'s account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
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
