<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class BerandaController extends Controller
{
    public function berandaBackend()
    {
        if (Auth::check() && Auth::user()->role == '1') {

            return view('backend.v_beranda.Admin');

        }
        return view('frontend.v_beranda.index');
    }

    public function indexGuest()
    {
        // Ambil 3 resep terbaru saja (biar pas dengan desain 3 kolom di gambarmu)
        $resep_terbaru = \App\Models\Recipe::where('status', 'approved')
                           ->orderBy('created_at', 'desc')
                           ->get();

        // Hitung total seluruh resep yang ada di database
        $total_resep = \App\Models\Recipe::count();

        // Asumsi total kategori, bisa disesuaikan kalau kamu punya tabel Kategori
        $total_kategori = 12;

        return view('frontend.v_beranda.index', compact('resep_terbaru', 'total_resep', 'total_kategori'));
    }
}