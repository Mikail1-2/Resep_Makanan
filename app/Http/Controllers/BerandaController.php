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

        $menuHariIni = Recipe::with('kategori')
            ->where('status', 'approved')
            ->latest('updated_at')
            ->take(6)
            ->get();

        return view('frontend.v_beranda.index', [
            'menuHariIni' => $menuHariIni,
        ]);
    }

    public function indexGuest(Request $request)
    {
        $lastViewed = collect();
        if (Auth::check() && session()->has('last_viewed')) {
            $ids = session('last_viewed');

            $lastViewed = Recipe::with('kategori', 'tags')
                ->whereIn('id', $ids)
                ->get()
                ->sortBy(fn($r) => array_search($r->id, $ids))
                ->values();
        }

        $resep_terbaru = Recipe::with('kategori', 'tags')
            ->where('status', 'approved')
            ->orderBy('created_at', 'desc')
            ->get();

        $menuHariIni = Recipe::with('kategori', 'tags')
            ->where('status', 'approved')
            ->latest('updated_at')
            ->take(6)
            ->get();

        $total_resep = Recipe::count();
        $total_kategori = 12;
        $tags = Tag::all();

        return view(
            'frontend.v_beranda.index',
            compact(
                'resep_terbaru',
                'menuHariIni',
                'total_resep',
                'total_kategori',
                'tags',
                'lastViewed'
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

        if (Auth::check()) {
            $lastViewed = session('last_viewed', []);

            // Hapus dulu kalau udah ada (biar gak duplikat & naik ke paling atas)
            $lastViewed = array_diff($lastViewed, [$id]);

            // Taro di paling depan
            array_unshift($lastViewed, $id);

            // Batasi cuma simpen 6 ID terakhir
            $lastViewed = array_slice($lastViewed, 0, 6);

            session(['last_viewed' => $lastViewed]);
        }


        return view('frontend.v_recipes.d_makanan', compact('resep'));
    }
}
