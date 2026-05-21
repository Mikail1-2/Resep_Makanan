<?php

namespace App\Http\Controllers;



class KategoriController extends Controller
{
    public function makanan()
    {
    return view('backend.v_kategori.k-makanan');
    }
    public function minuman()
    {
    return view('backend.v_kategori.k-minuman');
    }
    public function dessert()
    {
    return view ('backend.v_kategori.k-dessert');
    }
}
