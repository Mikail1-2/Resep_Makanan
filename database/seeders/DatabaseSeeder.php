<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Kategori;
use App\Models\Recipe;
use App\Models\Tag;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // ADMIN //
        User::create(['nama' => 'Administrator', 'email' => 'admin@admin.com', 'role' => '1', 'status' => 1, 'hp' => '0812345678901', 'password' => bcrypt('P@55word'),]);
        User::create(['nama' => 'Superadmin Utama', 'email' => 'superadmin@admin.com', 'role' => '1', 'status' => 1, 'hp' => '081298765401', 'password' => bcrypt('P@55word')]);
        User::create(['nama' => 'Admin Backup', 'email' => 'adminbackup@admin.com', 'role' => '1', 'status' => 1, 'hp' => '081298765402', 'password' => bcrypt('P@55word')]);

        // USER //
        User::create(['nama' => 'Dwi Ario Anggoro', 'email' => 'dwiario@gmail.com', 'role' => '0', 'status' => 1, 'hp' => '081234567892', 'password' => bcrypt('P@55word'),]);
        User::create(['nama' => 'Mikail Al Ghifary', 'email' => 'mikail@gmail.com', 'role' => '0', 'status' => 1, 'hp' => '081234567893', 'password' => bcrypt('P@55word'),]);
        User::create(['nama' => 'Hilman Saukani', 'email' => 'hilman@gmail.com', 'role' => '0', 'status' => 1, 'hp' => '081234567894', 'password' => bcrypt('P@55word'),]);
        User::create(['nama' => 'Rizky Aditya Pratama', 'email' => 'rizky.aditya@gmail.com', 'role' => '0', 'status' => 1, 'hp' => '081234567801', 'password' => bcrypt('P@55word')]);
        User::create(['nama' => 'Siti Rahayu Wulandari', 'email' => 'siti.rahayu@gmail.com', 'role' => '0', 'status' => 1, 'hp' => '081234567802', 'password' => bcrypt('P@55word')]);
        User::create(['nama' => 'Budi Santoso Wijaya', 'email' => 'budi.santoso@gmail.com', 'role' => '0', 'status' => 1, 'hp' => '081234567803', 'password' => bcrypt('P@55word')]);
        User::create(['nama' => 'Dewi Kartika Sari', 'email' => 'dewi.kartika@gmail.com', 'role' => '0', 'status' => 1, 'hp' => '081234567804', 'password' => bcrypt('P@55word')]);
        User::create(['nama' => 'Farhan Maulana Akbar', 'email' => 'farhan.maulana@gmail.com', 'role' => '0', 'status' => 0, 'hp' => '081234567805', 'password' => bcrypt('P@55word')]);
        User::create(['nama' => 'Nurul Hidayati Putri', 'email' => 'nurul.hidayati@gmail.com', 'role' => '0', 'status' => 1, 'hp' => '081234567806', 'password' => bcrypt('P@55word')]);
        User::create(['nama' => 'Andi Firmansyah Putra', 'email' => 'andi.firmansyah@gmail.com', 'role' => '0', 'status' => 0, 'hp' => '081234567807', 'password' => bcrypt('P@55word')]);
        User::create(['nama' => 'Lestari Mega Pertiwi', 'email' => 'lestari.mega@gmail.com', 'role' => '0', 'status' => 1, 'hp' => '081234567808', 'password' => bcrypt('P@55word')]);
        User::create(['nama' => 'Hendra Gunawan Saputra', 'email' => 'hendra.gunawan@gmail.com', 'role' => '0', 'status' => 1, 'hp' => '081234567809', 'password' => bcrypt('P@55word')]);
        User::create(['nama' => 'Indah Permata Sari', 'email' => 'indah.permata@gmail.com', 'role' => '0', 'status' => 0, 'hp' => '081234567810', 'password' => bcrypt('P@55word')]);
        User::create(['nama' => 'Yoga Dwi Prasetyo', 'email' => 'yoga.dwi@gmail.com', 'role' => '0', 'status' => 1, 'hp' => '081234567811', 'password' => bcrypt('P@55word')]);
        User::create(['nama' => 'Fitriani Nur Azizah', 'email' => 'fitriani.azizah@gmail.com', 'role' => '0', 'status' => 1, 'hp' => '081234567812', 'password' => bcrypt('P@55word')]);
        User::create(['nama' => 'Dimas Aryo Wibowo', 'email' => 'dimas.aryo@gmail.com', 'role' => '0', 'status' => 0, 'hp' => '081234567813', 'password' => bcrypt('P@55word')]);
        User::create(['nama' => 'Rini Setyawati Lestari', 'email' => 'rini.setyawati@gmail.com', 'role' => '0', 'status' => 1, 'hp' => '081234567814', 'password' => bcrypt('P@55word')]);
        User::create(['nama' => 'Agus Herianto Kusuma', 'email' => 'agus.herianto@gmail.com', 'role' => '0', 'status' => 1, 'hp' => '081234567815', 'password' => bcrypt('P@55word')]);
        User::create(['nama' => 'Melinda Cahya Ningrum', 'email' => 'melinda.cahya@gmail.com', 'role' => '0', 'status' => 0, 'hp' => '081234567816', 'password' => bcrypt('P@55word')]);
        User::create(['nama' => 'Bagas Eko Nugroho', 'email' => 'bagas.eko@gmail.com', 'role' => '0', 'status' => 1, 'hp' => '081234567817', 'password' => bcrypt('P@55word')]);


        // KATEGORI //
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
