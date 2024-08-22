<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return \Symfony\Component\HttpFoundation\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (!Auth::check() || Auth::user()->usertype !== $role) {
            return redirect('/dashboard');
        }

        return $next($request);
    }
}
