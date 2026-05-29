<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginBackend()
    {
        return view('frontend.v_login.login', [
            'judul' => 'login',
        ]);
    }

    public function authenticateBackend(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            
            // SAYA MATIKAN DULU CEK STATUSNYA BIAR KAMU BISA LOGIN
            // Kalau memang butuh, hapus tanda // nya, tapi pastikan status Admin di database = 1
            if (Auth::user()->status == 0) {
                Auth::logout();
                return back()->with('error', 'User belum aktif');
            }

            $request->session()->regenerate();

            // CEK ROLE DI SINI (0 = Admin, 1 = User Biasa)
            if (Auth::user()->role == 0) {
                // Admin dilempar ke Dashboard Admin
                return redirect()->intended(route('backend.beranda'));
            } else {
                // Selain Admin dilempar ke Halaman Utama/Guest
                return redirect('/');
            }
        }

        return back()->with('error', 'Login Gagal');
    }

    public function logoutBackend()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        
        // UBAH INI: Biar pas logout balik ke halaman depan (Guest), bukan ke admin lagi
        return redirect()->route('backend.beranda'); 
    }
}