<?php

namespace App\Http\Controllers;
use App\Models\Recipe;


class RecipeController extends Controller
{
    public function index()
    {
        return view('frontend.v_recipes.recipes');
    }
    public function kategori($nama_kategori)
    {
        // Cari resep di database yang kolom 'category'-nya sama dengan nama menu yang diklik
        $recipes = Recipe::where('category', $nama_kategori)->get();

        // Bikin judul halaman biar dinamis (contoh: "Kategori: Makanan")
        $judul = 'Kategori: ' . ucfirst($nama_kategori);

        return view('backend.v_recipes.kategori', compact('recipes', 'judul', 'nama_kategori'));
    }

    public function detail($id)
    {
        // 1. Cari data resep berdasarkan ID yang diklik
        $resep = Recipe::findOrFail($id);

        // 2. Cek angka kategori_id milik resep tersebut
        if ($resep->kategori_id == 1) {
            // Jika kategori_id = 1 (Makanan), buka file d-makanan
            return view('backend.v_kategori.d-makanan', compact('resep'));
        } elseif ($resep->kategori_id == 2) {
            // Jika kategori_id = 2 (Minuman), buka file d-minuman
            return view('backend.v_kategori.d-minuman', compact('resep'));
        } else {
            // Jika kategori_id = 3 (Dessert), buka file d-dessert
            return view('backend.v_kategori.d-dessert', compact('resep'));
        }
    }
}
