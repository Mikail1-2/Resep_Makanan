<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    // menampilkan form register
    public function index()
    {
        $data = [
            'judul' => 'Register User',
        ];

        return view('backend.v_register.register', $data);
    }

    // proses register
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:user,email',
            'password' => 'required|min:6',
            'hp' => 'nullable|max:13'
        ]);

        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'hp' => $request->hp,
            'role' => '0',
            'status' => 1
        ]);

        return redirect()->route('backend.login')
                         ->with('success', 'Register berhasil');
    }
}