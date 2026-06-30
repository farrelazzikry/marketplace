<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
<<<<<<< HEAD
=======
use App\Models\User;
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2

class AuthMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
<<<<<<< HEAD
        // cek apakah sudah login
        if (!session('is_login')) {
=======
        // Cek session login
        if (!session('is_login')) {
            // Cek cookie remember_token
            $token = $request->cookie('remember_token');
            if ($token) {
                $user = User::where('remember_token', $token)->first();
                if ($user) {
                    // Login otomatis
                    session([
                        'is_login' => true,
                        'user' => $user,
                        'user_id' => $user->id,
                        'role' => $user->role,
                        'user_name' => $user->name,
                    ]);
                    // Perpanjang cookie
                    cookie()->queue('remember_token', $token, 60 * 24 * 30);
                    return $next($request);
                } else {
                    // Token tidak valid, hapus cookie
                    cookie()->queue(cookie()->forget('remember_token'));
                }
            }
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2

            return redirect('/login')
                ->with('error', 'Silahkan login terlebih dahulu');
        }

<<<<<<< HEAD
=======
        // Cek blokir user
        $user = User::find(session('user_id'));
        if (!$user || $user->isBlocked()) {
            session()->flush();
            cookie()->queue(cookie()->forget('remember_token'));
            return redirect('/login')
                ->with('error', 'Akun Anda telah diblokir. Silakan hubungi admin.');
        }

>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
        return $next($request);
    }
}