<?php

namespace App\Http\Controllers;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::where('status', 'approved')
                                 ->orderBy('created_at', 'desc')
                                 ->get();

    return view('frontend.v_recipes.recipes', compact('recipes'));
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
            return view('frontend.v_kategori.d-makanan', compact('resep'));
        } elseif ($resep->kategori_id == 2) {
            // Jika kategori_id = 2 (Minuman), buka file d-minuman
            return view('frontend.v_kategori.d-minuman', compact('resep'));
        } else {
            // Jika kategori_id = 3 (Dessert), buka file d-dessert
            return view('frontend.v_kategori.d-dessert', compact('resep'));
        }
    }

    public function approval()
    {
        $recipes = Recipe::with([
            'user',
            'kategori'
        ])
            ->where('status', 'pending')
            ->get();

        return view('backend.v_approval.approval', compact('recipes'));
    }

    public function approve($id)
    {
        $recipe = Recipe::findOrFail($id);

        $recipe->status = 'approved';

        $recipe->save();

        return redirect()
            ->route('backend.approval')
            ->with('success', 'Recipe approved successfully');
    }
    public function reject(Request $request, $id)
    {
        $recipe = Recipe::findOrFail($id);

        $recipe->status = 'rejected';

        $recipe->reject_reason = $request->reject_reason;

        $recipe->save();

        return redirect()->route('backend.approval');
    }
    public function myRecipe()
    {
        $recipes = Recipe::with('kategori')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view(
            'frontend.v_myrecipe.myrecipe',
            compact('recipes')
        );
    }
}
