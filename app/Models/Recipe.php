<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    // 1. Tentukan nama tabelnya di database (opsional kalau namanya sudah sesuai jamak 'recipes')
    protected $table = 'recipes';

    // 2. Daftarkan kolom yang boleh diisi secara massal (Mass Assignment)
    protected $fillable = [
        'recipe_name',
        'kategori_id',
        'image',
        'ingredients',
        'instructions',
    ];

    // Tambahkan fungsi ini di dalam class Recipe
    public function kategori()
    {
        // Pastikan 'kategori_id' sesuai dengan nama kolom yang ada di tabel recipes kamu
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}