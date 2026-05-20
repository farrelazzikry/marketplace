<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // cek apakah sudah login
        if (!session('is_login')) {

            return redirect('/login')
                ->with('error', 'Silahkan login terlebih dahulu');
        }

        return $next($request);
    }
}