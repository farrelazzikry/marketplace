<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();
        return view('pages.admin.users.index', compact('users'));
    }

    public function block($id)
    {
        $user = User::findOrFail($id);
        $adminId = session('user_id');

        // 🔥 CEK KETAT: Cegah admin memblokir dirinya sendiri
        if ($user->id == $adminId) {
            return redirect()->back()->with('error', '⚠️ Anda tidak bisa memblokir akun sendiri!');
        }

        // Cegah admin memblokir admin lain (opsional, tapi lebih aman)
        if ($user->role == 'admin') {
            return redirect()->back()->with('error', '⚠️ Anda tidak bisa memblokir admin lain!');
        }

        $user->block();
        return redirect()->back()->with('success', '✅ User berhasil diblokir!');
    }

    public function unblock($id)
    {
        $user = User::findOrFail($id);
        $adminId = session('user_id');

        // 🔥 CEK KETAT: Cegah admin meng-unblokir dirinya sendiri
        if ($user->id == $adminId) {
            return redirect()->back()->with('error', '⚠️ Anda tidak bisa meng-unblokir akun sendiri!');
        }

        // Cegah admin meng-unblokir admin lain (opsional)
        if ($user->role == 'admin') {
            return redirect()->back()->with('error', '⚠️ Anda tidak bisa meng-unblokir admin lain!');
        }

        $user->unblock();
        return redirect()->back()->with('success', '✅ User berhasil diunblokir!');
    }

    public function resetPassword($id)
    {
        $user = User::findOrFail($id);
        $adminId = session('user_id');

        // Cegah admin mereset password sendiri (tambahan keamanan)
        if ($user->id == $adminId) {
            return redirect()->back()->with('error', '⚠️ Anda tidak bisa mereset password sendiri!');
        }

        $newPassword = Str::random(8);

        $user->update([
            'password' => Hash::make($newPassword),
        ]);

        return redirect()->back()->with('success', '✅ Password berhasil direset! Password baru: ' . $newPassword);
    }
}