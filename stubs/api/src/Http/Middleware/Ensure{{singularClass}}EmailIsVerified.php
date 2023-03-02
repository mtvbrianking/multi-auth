<?php

namespace App\Modules\{{pluralClass}}\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\Request;
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
        if (
            !$request->user('{{singularSlug}}')
            || ($request->user('{{singularSlug}}') instanceof MustVerifyEmail
                && !$request->user('{{singularSlug}}')->hasVerifiedEmail())
        ) {
            return response()->json(['message' => 'Your email address is not verified.'], 409);
        }

        return $next($request);
    }
}
