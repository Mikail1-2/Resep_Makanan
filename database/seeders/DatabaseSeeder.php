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

        // RESEP //
        Recipe::create(['recipe_name' => 'Nasi Goreng Spesial', 'user_id' => 1, 'kategori_id' => 1, 'status' => 'approved', 'image' => 'default.jpg', 'ingredients' => 'Nasi, telur, kecap, bawang merah, bawang putih, cabai, garam', 'instructions' => 'Tumis bawang, masukkan nasi, tambahkan kecap dan telur, aduk rata, sajikan.']);

        Recipe::create(['recipe_name' => 'Ayam Bakar Madu', 'user_id' => 1, 'kategori_id' => 1, 'status' => 'approved', 'image' => 'default.jpg', 'ingredients' => 'Ayam, madu, kecap manis, bawang putih, jahe, garam, merica', 'instructions' => 'Marinasi ayam dengan bumbu, diamkan 1 jam, bakar hingga matang sambil diolesi madu.']);

        Recipe::create(['recipe_name' => 'Soto Ayam', 'user_id' => 2, 'kategori_id' => 1, 'status' => 'approved', 'image' => 'default.jpg', 'ingredients' => 'Ayam, kunyit, serai, daun salam, bawang merah, bawang putih, garam', 'instructions' => 'Rebus ayam dengan bumbu hingga matang, suwir ayam, sajikan dengan kuah kaldu.']);

        Recipe::create(['recipe_name' => 'Rendang Daging', 'user_id' => 2, 'kategori_id' => 1, 'status' => 'pending', 'image' => 'default.jpg', 'ingredients' => 'Daging sapi, santan, cabai, serai, daun jeruk, lengkuas, garam', 'instructions' => 'Masak daging dengan bumbu dan santan hingga kering dan berwarna coklat gelap.']);

        Recipe::create(['recipe_name' => 'Es Teh Manis', 'user_id' => 1, 'kategori_id' => 2, 'status' => 'approved', 'image' => 'default.jpg', 'ingredients' => 'Teh celup, gula pasir, air panas, es batu', 'instructions' => 'Seduh teh dengan air panas, tambahkan gula, aduk rata, tambahkan es batu.']);

        Recipe::create(['recipe_name' => 'Jus Alpukat', 'user_id' => 3, 'kategori_id' => 2, 'status' => 'approved', 'image' => 'default.jpg', 'ingredients' => 'Alpukat, susu kental manis, gula, es batu, air', 'instructions' => 'Blender semua bahan hingga halus, tuang ke gelas, sajikan dingin.']);

        Recipe::create(['recipe_name' => 'Es Jeruk Segar', 'user_id' => 3, 'kategori_id' => 2, 'status' => 'approved', 'image' => 'default.jpg', 'ingredients' => 'Jeruk peras, gula, air, es batu', 'instructions' => 'Peras jeruk, campur dengan air dan gula, tambahkan es batu, sajikan.']);

        Recipe::create(['recipe_name' => 'Smoothie Mangga', 'user_id' => 2, 'kategori_id' => 2, 'status' => 'pending', 'image' => 'default.jpg', 'ingredients' => 'Mangga, yogurt, madu, susu, es batu', 'instructions' => 'Blender semua bahan hingga lembut, tuang ke gelas, sajikan segera.']);

        Recipe::create(['recipe_name' => 'Brownies Coklat', 'user_id' => 1, 'kategori_id' => 3, 'status' => 'approved', 'image' => 'default.jpg', 'ingredients' => 'Coklat batang, mentega, telur, gula, tepung terigu, baking powder', 'instructions' => 'Lelehkan coklat dan mentega, campur bahan kering, aduk rata, panggang 30 menit.']);

        Recipe::create(['recipe_name' => 'Puding Susu', 'user_id' => 3, 'kategori_id' => 3, 'status' => 'approved', 'image' => 'default.jpg', 'ingredients' => 'Susu cair, agar-agar, gula, vanili', 'instructions' => 'Rebus semua bahan hingga mendidih, tuang ke cetakan, dinginkan hingga set.']);

        Recipe::create(['recipe_name' => 'Es Krim Vanilla', 'user_id' => 2, 'kategori_id' => 3, 'status' => 'approved', 'image' => 'default.jpg', 'ingredients' => 'Susu krim, gula, telur, vanili, garam', 'instructions' => 'Campur semua bahan, masak hingga mengental, dinginkan dalam freezer sambil diaduk.']);

        Recipe::create(['recipe_name' => 'Tiramisu', 'user_id' => 1, 'kategori_id' => 3, 'status' => 'pending', 'image' => 'default.jpg', 'ingredients' => 'Ladyfinger, mascarpone, kopi, telur, gula, coklat bubuk', 'instructions' => 'Celup ladyfinger ke kopi, susun berlapis dengan krim mascarpone, taburi coklat bubuk.']);
    }
}
