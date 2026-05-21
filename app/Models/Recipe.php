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
        'category',
        'image',
        'ingredients',
        'instructions',
    ];
}