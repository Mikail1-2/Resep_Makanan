<?php

namespace App\Http\Controllers;

class KategoriController extends Controller
{
    public function makanan()
    {
        // 1. Koki memasak data dari database (kategori 1 DAN status wajib approved)
        $recipes = \App\Models\Recipe::where('kategori_id', 1)
                                     ->where('status', 'approved')
                                     ->get();

        // 2. Koki menyerahkan piringnya ke pelayan
        return view('frontend.v_kategori.k-makanan', compact('recipes'));
    }

    public function minuman()
    {
        // 1. Koki memasak data dari database (kategori 2 DAN status wajib approved)
        $recipes = \App\Models\Recipe::where('kategori_id', 2)
                                     ->where('status', 'approved')
                                     ->get();

        // 2. Koki menyerahkan piringnya ke pelayan
        return view('frontend.v_kategori.k-minuman', compact('recipes'));
    }

    public function dessert()
    {
        // 1. Koki memasak data dari database (kategori 3 DAN status wajib approved)
        $recipes = \App\Models\Recipe::where('kategori_id', 3)
                                     ->where('status', 'approved')
                                     ->get();

        // 2. Koki menyerahkan piringnya ke pelayan
        return view('frontend.v_kategori.k-dessert', compact('recipes'));
    }
}