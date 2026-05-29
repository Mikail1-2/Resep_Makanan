<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class BerandaController extends Controller
{
    public function berandaBackend()
    {
        if (Auth::check() && Auth::user()->role == '1') {

            return view('backend.v_beranda.admin');

        }
        return view('backend.v_beranda.index');
    }

    public function indexGuest()
    {
        // Panggil model Recipe kalau kamu mau nampilin data resep di halaman depan
        $recipes = \App\Models\Recipe::all();

        // Ganti 'backend.v_beranda.guest' sesuai dengan nama file Blade halaman depan kamu
        return view('backend.v_beranda.index', compact('recipes'));
    }
}