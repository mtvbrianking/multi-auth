<?php

namespace App\Modules\{{pluralClass}}\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

/**
 * @see \Http\Middleware\Authenticate
 */
class RedirectIfNot{{singularClass}}
{
    /**
     * Handle an incoming request.
     *
     * @throws \Illuminate\Auth\AuthenticationException
     */
    public function handle(Request $request, Closure $next, string $guard = '{{singularSlug}}'): Response
    {
        if (Auth::guard($guard)->check()) {
            return $next($request);
        }

        $redirectToRoute = $request->expectsJson() ? '' : route('{{singularSlug}}.login');

        throw new AuthenticationException(
            'Unauthenticated.',
            [$guard],
            $redirectToRoute
        );
    }
}
