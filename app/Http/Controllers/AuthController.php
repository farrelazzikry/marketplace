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

        if ($email === 'user@gmail.com') {
            return redirect()->route('user.dashboard');
        }

        if ($email === 'admin@gmail.com') {
            return redirect()->route('admin.dashboard');
        }

        return back()->with('error', 'Email tidak terdaftar');
    }
}
