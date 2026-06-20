<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class UserMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // cek role user
        if (session('role') != 'user') {
            abort(403, 'AKSES DITOLAK');
        }

        // Cek blokir juga di sini (lapisan kedua)
        $user = User::find(session('user_id'));
        if (!$user || $user->isBlocked()) {
            session()->flush();
            return redirect('/login')->with('error', 'Akun Anda telah diblokir.');
        }

        return $next($request);
    }
}