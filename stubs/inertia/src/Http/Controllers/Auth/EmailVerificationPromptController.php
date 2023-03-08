<?php

namespace App\Modules\{{pluralClass}}\Http\Controllers\Auth;

use App\Modules\{{pluralClass}}\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     */
    public function __invoke(Request $request): RedirectResponse|Response
    {
        return $request->user('{{singularSlug}}')->hasVerifiedEmail()
            ? redirect()->intended('/{{singularSlug}}')
            : Inertia::render('Auth/VerifyEmail', ['status' => session('status')]);
    }
}
