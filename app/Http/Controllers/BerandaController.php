<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Recipe;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Models\User;

class BerandaController extends Controller
{
    public function berandaBackend()
    {
        if (Auth::check() && Auth::user()->role == '1') {

            return view('backend.v_beranda.Admin', [
                'judul' => 'Dashboard',
                'totalUser' => User::count(),
                'totalRecipe' => Recipe::count(),
                'totalPending'   => Recipe::where('status', 'pending')->count(),

                // Buat diagram pie //
                'chartMakanan' => Recipe::where('status', 'approved')->where('kategori_id', 1)->count(),
                'chartMinuman' => Recipe::where('status', 'approved')->where('kategori_id', 2)->count(),
                'chartDessert' => Recipe::where('status', 'approved')->where('kategori_id', 3)->count(),
            ]);
        }

        return view('frontend.v_beranda.index');
    }

    public function indexGuest(Request $request)
    {
        // Ambil 3 resep terbaru saja (biar pas dengan desain 3 kolom di gambarmu)
        $resep_terbaru = Recipe::where('status', 'approved')
            ->orderBy('created_at', 'desc')
            ->get();

        // Hitung total seluruh resep yang ada di database
        $total_resep = Recipe::count();

        // Asumsi total kategori, bisa disesuaikan kalau kamu punya tabel Kategori
        $total_kategori = 12;

        return view(
            'frontend.v_beranda.index',
            compact(
                'resep_terbaru',
                'total_resep',
                'total_kategori',
                'tags'
            )
        );
    }

    public function makanan(Request $request)
    {
        // 1. Ambil data tag untuk ditampilkan di opsi dropdown filter
        $tags = Tag::all();

        // 2. Siapkan wadah query utama (misal kategori_id = 1 untuk Makanan)
        // Jangan langsung di-get() dulu, karena kita mau saring!
        $query = Recipe::where('kategori_id', 1)->where('status', 'approved');

        // 3. LOGIKA PENCARIAN KATA (SEARCH)
        if ($request->has('search') && $request->search != '') {
            // Tanda % di depan dan belakang artinya "cari huruf ini di mana saja (depan, tengah, belakang)"
            $query->where('recipe_name', 'like', '%' . $request->search . '%');
        }

        // 4. LOGIKA FILTER TAG
        if ($request->has('tag') && $request->tag != '') {
            // whereHas akan mengecek ke tabel perantara (recipe_tag)
            $query->whereHas('tags', function ($q) use ($request) {
                $q->where('name', $request->tag); // Saring berdasarkan nama tag
            });
        }

        // 5. Setelah selesai disaring, baru kita eksekusi (get)
        $resep_terbaru = $query->get();

        return view('frontend.v_recipes.makanan', compact('resep_terbaru', 'tags'));
    }

    public function detailResep($id)
    {
        $resep = Recipe::with('tags')->findOrFail($id);

        return view('frontend.v_recipes.d_makanan', compact('resep'));
    }
}
