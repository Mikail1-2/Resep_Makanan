<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Kategori;
use App\Models\Tag;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'nama' => 'Administrator',
            'email' => 'admin@admin.com',
            'role' => '1',
            'status' => 1,
            'hp' => '0812345678901',
            'password' => bcrypt('P@55word'),
        ]);

        User::create([
            'nama' => 'Dwi Ario Anggoro',
            'email' => 'dwiario@gmail.com',
            'role' => '0',
            'status' => 1,
            'hp' => '081234567892',
            'password' => bcrypt('P@55word'),
        ]);

        User::create([
            'nama' => 'Mikail Al Ghifary',
            'email' => 'mikail@gmail.com',
            'role' => '0',
            'status' => 1,
            'hp' => '081234567893',
            'password' => bcrypt('P@55word'),
        ]);

        User::create([
            'nama' => 'Hilman Saukani',
            'email' => 'hilman@gmail.com',
            'role' => '0',
            'status' => 1,
            'hp' => '081234567894',
            'password' => bcrypt('P@55word'),
        ]);

        Kategori::create([
            'name' => 'makanan'
        ]);

        Kategori::create([
            'name' => 'minuman'
        ]);

        Kategori::create([
            'name' => 'dessert'
        ]); 

        Tag::create([
            'name' => 'Goreng'
        ]);

        Tag::create([
            'name' => 'Rebus'
        ]);

        Tag::create([
            'name' => 'Bakar'
        ]);

        Tag::create([
            'name' => 'Kukus'
        ]);

         Tag::create([
            'name' => 'Tumis'
        ]);

        Tag::create([
            'name' => 'CepatSaji'
        ]);

        Tag::create([
            'name' => 'Tradisional'
        ]);

        Tag::create([
            'name' => 'Vegetarian'
        ]);

        Tag::create([
            'name' => 'Panggang '
        ]);
    }
}