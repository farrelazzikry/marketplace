<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
<<<<<<< HEAD
=======
use App\Models\User;
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2

class UserMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // cek role user
        if (session('role') != 'user') {
<<<<<<< HEAD

            abort(403, 'AKSES DITOLAK');
        }

=======
            abort(403, 'AKSES DITOLAK');
        }

        // Cek blokir juga di sini (lapisan kedua)
        $user = User::find(session('user_id'));
        if (!$user || $user->isBlocked()) {
            session()->flush();
            return redirect('/login')->with('error', 'Akun Anda telah diblokir.');
        }

>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
        return $next($request);
    }
}