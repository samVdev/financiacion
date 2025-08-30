<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && Auth::user()->isAdmin()) {
            return $next($request);
        }
        return response()->json(['message' => 'Acceso no autorizado'], 403);
    }
}
