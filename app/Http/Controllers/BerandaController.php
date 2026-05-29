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
        // Mengambil 6 resep terbaru dari database (diurutkan dari yang paling akhir dibuat)
        $resep_terbaru = \App\Models\Recipe::orderBy('created_at', 'desc')->take(6)->get();
        
        // Membuka file beranda publik dan mengirimkan data resepnya
        return view('frontend.beranda', compact('resep_terbaru'));
    }
}