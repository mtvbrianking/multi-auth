<?php

namespace App\Modules\{{pluralClass}}\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

/**
 * @see \Http\Middleware\RedirectIfAuthenticated
 */
class RedirectIf{{singularClass}}
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, string $guard = '{{singularSlug}}'): Response
    {
        if (Auth::guard($guard)->check()) {
            return redirect('/{{singularSlug}}');
        }

        return $next($request);
    }
}
