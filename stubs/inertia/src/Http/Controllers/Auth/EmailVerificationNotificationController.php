<?php

namespace App\Modules\{{pluralClass}}\Http\Controllers\Auth;

use App\Modules\{{pluralClass}}\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     */
    public function store(Request $request): RedirectResponse
    {
        if ($request->user('{{singularSlug}}')->hasVerifiedEmail()) {
            return redirect()->intended('/{{singularSlug}}');
        }

        $request->user('{{singularSlug}}')->sendEmailVerificationNotification();

        return back()->with('status', 'verification-link-sent');
    }
}
