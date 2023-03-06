<?php

namespace App\Modules\{{pluralClass}}\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Response;

/**
 * @see \Illuminate\Auth\Middleware\EnsureEmailIsVerified
 */
class Ensure{{singularClass}}EmailIsVerified
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, ?string $redirectToRoute = null): Response
    {
        if (! $request->user('{{singularSlug}}')
            || ($request->user('{{singularSlug}}') instanceof MustVerifyEmail
                && ! $request->user('{{singularSlug}}')->hasVerifiedEmail())) {
            return $request->expectsJson()
                    ? abort(403, 'Your email address is not verified.')
                    : Redirect::route($redirectToRoute ?: '{{singularSlug}}.verification.notice');
        }

        return $next($request);
    }
}
