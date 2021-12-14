<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnforcerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$args)
    {
        $user = auth()->user();

        $allowed = $user->hasPermission(...$args)
            || $user->isSuperAdmin();

        abort_unless($allowed, 403, 'Access denied.');

        return $next($request);
    }
}
