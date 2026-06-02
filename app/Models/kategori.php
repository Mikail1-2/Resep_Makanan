<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    use HasFactory;

    protected $table = "kategori";

    protected $fillable = [
        'name',
    ];

    public $timestamps = false;

    // --- TAMBAHKAN BLOK KODE INI ---
    public function recipes()
    {
        // Ingat: Sesuaikan 'kategori_id' dengan nama kolom yang ada di tabel recipes kamu nanti
        return $this->hasMany(Recipe::class, 'kategori_id');
    }
}