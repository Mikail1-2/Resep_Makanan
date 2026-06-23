<?php

namespace App\Http\Controllers;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecipeController extends Controller
{
    public function index()
    {
        $tags = \App\Models\Tag::with('recipes')->get();

        $recipes = Recipe::where('status', 'approved')
                                 ->orderBy('created_at', 'desc')
                                 ->get();

    return view('frontend.v_recipes.recipes', compact('recipes', 'tags'));
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
        $pendingRecipes = Recipe::with('kategori')
            ->where('user_id', Auth::id())
            ->where('status', 'pending')
            ->latest()
            ->get();

        $rejectedRecipes = Recipe::with('kategori')
            ->where('user_id', Auth::id())
            ->where('status', 'rejected')
            ->latest()
            ->get();

        $approvedRecipes = Recipe::with('kategori')
            ->where('user_id', Auth::id())
            ->where('status', 'approved')
            ->latest()
            ->get();

        return view(
            'frontend.v_myrecipe.myrecipe',
            compact(
                'pendingRecipes',
                'rejectedRecipes',
                'approvedRecipes'
            )
        );
    }

    public function show($id)
    {
        $recipe = Recipe::with([
            'user',
            'kategori'
        ])
            ->where('user_id', Auth::id())
            ->findOrFail($id);

        return view(
            'frontend.v_myrecipe.show',
            compact('recipe')
        );
    }
    public function edit($id)
    {
        $recipe = Recipe::where(
            'user_id',
            Auth::id()
        )->findOrFail($id);

        return view(
            'frontend.v_myrecipe.edit',
            compact('recipe')
        );
    }

    public function update(Request $request, $id)
    {
        $recipe = Recipe::where(
            'user_id',
            Auth::id()
        )->findOrFail($id);

        $recipe->recipe_name = $request->recipe_name;
        $recipe->kategori_id = $request->kategori_id;
        $recipe->ingredients = $request->ingredients;
        $recipe->instructions = $request->instructions;

        if ($request->hasFile('image')) {

            $filename =
                time() . '.' .
                $request->image->extension();

            $request->image->move(
                public_path('uploads/recipes'),
                $filename
            );

            $recipe->image = $filename;
        }

        // otomatis kirim ulang ke approval
        $recipe->status = 'pending';

        // hapus alasan reject lama
        $recipe->reject_reason = null;

        $recipe->save();

        return redirect()
            ->route(
                'frontend.myrecipe.show',
                $recipe->id
            )
            ->with(
                'success',
                'Recipe resubmitted successfully.'
            );
    }
}
