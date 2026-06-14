<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\Tag;

class KategoriController extends Controller
{
    // --- FUNGSI MAKANAN (Kategori ID: 1) ---
    public function makanan(Request $request)
    {
        $tags = Tag::all();
        // Siapkan "Panci" utama
        $query = Recipe::where('kategori_id', 1)->where('status', 'approved');

        // Saring kalau ada pencarian
        if ($request->filled('search')) {
            $query->where('recipe_name', 'like', '%' . $request->search . '%');
        }

        // Saring kalau ada filter tag
        if ($request->filled('tags')) {
            $query->whereHas('tags', function ($q) use ($request) {
                $q->whereIn('name', $request->tags);
            });
        }

        $recipes = $query->get();
        return view('frontend.v_kategori.k-makanan', compact('recipes', 'tags'));
    }

    // --- FUNGSI MINUMAN (Kategori ID: 2) ---
    public function minuman(Request $request)
    {
        $tags = Tag::all();
        $query = Recipe::where('kategori_id', 2)->where('status', 'approved');

        if ($request->filled('search')) {
            $query->where('recipe_name', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('tags')) {
            $query->whereHas('tags', function ($q) use ($request) {
                $q->whereIn('name', $request->tags);
            });
        }

        $recipes = $query->get();
        return view('frontend.v_kategori.k-minuman', compact('recipes', 'tags'));
    }

    // --- FUNGSI DESSERT (Kategori ID: 3) ---
    public function dessert(Request $request)
    {
        $tags = Tag::all();
        $query = Recipe::where('kategori_id', 3)->where('status', 'approved');

        if ($request->filled('search')) {
            $query->where('recipe_name', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('tags')) {
            $query->whereHas('tags', function ($q) use ($request) {
                $q->whereIn('name', $request->tags);
            });
        }

        $recipes = $query->get();
        return view('frontend.v_kategori.k-dessert', compact('recipes', 'tags'));
    }
}