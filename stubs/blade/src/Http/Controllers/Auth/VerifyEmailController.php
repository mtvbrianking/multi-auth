<?php

namespace App\Modules\{{pluralClass}}\Http\Controllers\Auth;

use App\Modules\{{pluralClass}}\Http\Controllers\Controller;
use App\Modules\{{pluralClass}}\Http\Requests\Auth\EmailVerificationRequest;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\RedirectResponse;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated {{singularSlug}}'s email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        if ($request->user('{{singularSlug}}')->hasVerifiedEmail()) {
            return redirect()->intended('/{{singularSlug}}?verified=1');
        }

        if ($request->user('{{singularSlug}}')->markEmailAsVerified()) {
            event(new Verified($request->user('{{singularSlug}}')));
        }

        return redirect()->intended('/{{singularSlug}}?verified=1');
    }
}
