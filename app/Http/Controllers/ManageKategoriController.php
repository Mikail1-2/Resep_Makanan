<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use Illuminate\Http\Request;
use App\Models\Tag;

class ManageKategoriController extends Controller
{
    public function index()
    {
        $categories = kategori::with('resep')->get();
        $tags = Tag::with('recipes')->get();

        return view(
            'backend.v_manage-kategori.index',
            compact('categories', 'tags')
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        kategori::create([
            'name' => $request->name
        ]);

        return back()->with('success', 'Kategori berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $category = kategori::findOrFail($id);

        $category->update([
            'name' => $request->name
        ]);

        return back()->with('success', 'Kategori berhasil diupdate');
    }

    public function destroy($id)
    {
        kategori::findOrFail($id)->delete();

        return back()->with('success', 'Kategori berhasil dihapus');
    }

    public function storeTag(Request $request)
    {
        $request->validate(['name' => 'required']);
        Tag::create(['name' => $request->name]);
        return back()->with('success', 'Tag berhasil ditambahkan');
    }

    public function updateTag(Request $request, $id)
    {
        Tag::findOrFail($id)->update(['name' => $request->name]);
        return back()->with('success', 'Tag berhasil diupdate');
    }

    public function destroyTag($id)
    {
        Tag::findOrFail($id)->delete();
        return back()->with('success', 'Tag berhasil dihapus');
    }
}