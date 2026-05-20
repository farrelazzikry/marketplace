<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // cek role user
        if (session('role') != 'user') {

            abort(403, 'AKSES DITOLAK');
        }

        return $next($request);
    }
}