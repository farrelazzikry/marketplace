<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;
use App\Mail\SendOTPRegister;

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

    // FUNGSI BARU: HANYA UNTUK KIRIM OTP (DIPANGGIL LEWAT AJAX)
    public function sendOtp(Request $request)
    {
        // Validasi input email dulu
        $request->validate([
            'email' => 'required|email|unique:users,email',
        ], [
            'email.unique' => 'Email ini sudah terdaftar!'
        ]);

        $otp = rand(100000, 999999);

        // Simpan ke cache 5 menit berdasarkan email yang diinput
        Cache::put('otp_' . $request->email, $otp, 300);

        // Kirim email (Karena belum ada user di DB, kirim nama "Calvera User")
        Mail::to($request->email)->send(new SendOTPRegister($otp, 'User Calvera'));

        return response()->json([
            'status' => 'success',
            'message' => 'Kode OTP berhasil dikirim ke Gmail kamu!'
        ]);
    }

    // PROSES REGISTER AKHIR
    public function doRegister(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'otp_code' => 'required|numeric' // <-- diubah jadi otp_code sesuai input blade
        ]);

        // Cek OTP dari Cache
        $cachedOtp = Cache::get('otp_' . $request->email);

        if (!$cachedOtp || $cachedOtp != $request->otp_code) { // <-- diubah jadi otp_code
            return back()->withInput()->with('error', 'Kode OTP salah atau sudah kedaluwarsa!');
        }

        // Jika OTP benar, buat user langsung AKTIF (isi email_verified_at)
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
            'email_verified_at' => now() // Langsung aktif
        ]);

        // Hapus cache OTP
        Cache::forget('otp_' . $request->email);

        return redirect()->route('login')->with('success', 'Register berhasil dan akun aktif! Silakan login.');
    }

    public function doLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('error', 'Email tidak ditemukan');
        }

        // Proteksi jika email_verified_at null (jika ada user lama yang belum verifikasi)
        if (is_null($user->email_verified_at)) {
            return back()->with('error', 'Akun Anda belum diverifikasi. Silakan hubungi admin.');
        }

        if (!Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Password salah');
        }

        session([
            'is_login' => true,
            'user' => $user,
            'user_id' => $user->id,
            'role' => $user->role,
            'user_name' => $user->name,
        ]);

        if ($user->role == 'admin') {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('user.dashboard');
    }

    public function logout()
    {
        session()->flush();
        return redirect('/');
    }
}