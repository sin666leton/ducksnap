<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthOnlyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->user())
            return redirect()
                ->guest(route('login'))
                ->with('error', 'Kamu harus login terlebih dahulu');

        return $next($request);
    }
}
