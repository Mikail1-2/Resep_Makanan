<?php

namespace App\Http\Controllers;



class KategoriController extends Controller
{
    public function makanan()
    {
        // 1. Koki memasak/mengambil data dari database (kategori_id 1 = Makanan)
        $recipes = \App\Models\Recipe::where('kategori_id', 1)->get();

        // 2. Koki menyerahkan piringnya ke pelayan menggunakan compact('recipes')
        return view('frontend.v_kategori.k-makanan', compact('recipes'));
    }
    public function minuman()
    {
        // 1. Koki memasak/mengambil data dari database (kategori_id 2 = Minuman)
        $recipes = \App\Models\Recipe::where('kategori_id', 2)->get();

        // 2. Koki menyerahkan piringnya ke pelayan menggunakan compact('recipes')
        return view('frontend.v_kategori.k-minuman', compact('recipes'));
    }
    public function dessert()
    {
        // 1. Koki memasak/mengambil data dari database (kategori_id 3 = Dessert)
        $recipes = \App\Models\Recipe::where('kategori_id', 3)->get();

        // 2. Koki menyerahkan piringnya ke pelayan menggunakan compact('recipes')
        return view('frontend.v_kategori.k-dessert', compact('recipes'));
    }
}
