<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    public function index()
    {
        return view('frontend.v_forgot-password.forgot-password');
    }

    public function kirim(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink($request->only('email'));

        return $status === Password::RESET_LINK_SENT
            ? back()->with('success', 'Link reset password sudah dikirim ke email kamu!')
            : back()->with('error', 'Email tidak ditemukan.');
    }

}
