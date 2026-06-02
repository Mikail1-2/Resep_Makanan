<?php

namespace App\Http\Controllers;

// 1. Tambahkan dua baris ini untuk memanggil Request dan Model Recipe
use Illuminate\Http\Request;
use App\Models\Recipe;

class CreateRecipeController extends Controller
{
    // Fungsi untuk menampilkan halaman form (Sudah ada)
    public function index()
    {
        return view('frontend.v_recipes.create');
    }

    // 2. Tambahkan fungsi store() ini untuk memproses form
    public function store(Request $request)
    {
        // Validasi inputan agar tidak ada yang kosong
        $request->validate([
            'recipe_name' => 'required',
            'kategori_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Wajib gambar, maks 2MB
            'ingredients' => 'required',
            'instructions' => 'required',
        ]);

        // Tangkap semua isian form
        $data = $request->all();

        $data['status'] = 'pending';    

        $data['user_id'] = auth()->id();

        // Proses penyimpanan gambar ke folder Laragon
        if ($gambar = $request->file('image')) {
            // Tentukan folder penyimpanan (otomatis terbuat di dalam folder public)
            $tujuan_upload = 'uploads/recipes/';

            // Bikin nama file unik pakai kombinasi tanggal dan jam
            $nama_gambar = date('YmdHis') . "." . $gambar->getClientOriginalExtension();

            // Pindahkan file ke folder tujuan
            $gambar->move(public_path($tujuan_upload), $nama_gambar);

            // Simpan nama filenya ke database
            $data['image'] = $nama_gambar;
        }

        // Simpan semua data ke tabel recipes
        Recipe::create($data);

        // Lempar balik ke halaman daftar resep (Pastikan nama route-nya sesuai)
        return redirect()->route('web.utama')->with('success', 'Resep berhasil dikirim dan sedang menunggu persetujuan Admin!');
    }
}