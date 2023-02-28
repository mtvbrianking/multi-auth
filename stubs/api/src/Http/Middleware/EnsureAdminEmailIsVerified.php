<?php

namespace App\Modules\Admins\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Response;

/**
 * @see \Illuminate\Auth\Middleware\EnsureEmailIsVerified
 */
class EnsureAdminEmailIsVerified
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, ?string $redirectToRoute = null): Response
    {
        if (
            !$request->user('admin')
            || ($request->user('admin') instanceof MustVerifyEmail
                && !$request->user('admin')->hasVerifiedEmail())
        ) {
            return response()->json(['message' => 'Your email address is not verified.'], 409);
        }

        return $next($request);
    }
}
