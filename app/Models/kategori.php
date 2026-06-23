<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    public $timestamps = false;
     protected $table = 'kategori';

    protected $fillable = [
        'name'
    ];

    public function resep()
    {
        return $this->hasMany(Recipe::class,'kategori_id');
    }
    
}