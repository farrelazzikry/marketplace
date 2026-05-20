<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // cek role admin
        if (session('role') != 'admin') {

            abort(403, 'AKSES DITOLAK');
        }

        return $next($request);
    }
}