<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('pages.auth.login');
    }

    public function register()
    {
        return view('pages.auth.register');
    }

    public function doLogin(Request $request)
    {
        $email = $request->email;

        // Login sebagai USER
        if ($email === 'user@gmail.com') {
            session([
                'is_login' => true,
                'role' => 'user',
                'user_name' => 'Farrel User'
            ]);
            return redirect()->route('user.dashboard');
        }

        // Login sebagai ADMIN
        if ($email === 'admin@gmail.com') {
            session([
                'is_login' => true,
                'role' => 'admin',
                'user_name' => 'Admin Ganteng'
            ]);
            return redirect()->route('admin.dashboard');
        }

        return back()->with('error', 'Email tidak terdaftar');
    }

    public function logout()
    {
        // Hapus semua session login
        session()->forget(['is_login', 'role', 'user_name']);

        // Balikin ke homepage
        return redirect('/');
    }
}