<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\CreateRecipeController;
use App\Http\Controllers\KategoriController;

// =========================================================
// 🟢 ZONA PUBLIK (Tamu / Belum Login)
// URL bersih, bebas diakses siapapun tanpa awalan "/backend"
// =========================================================

// Halaman Beranda Guest (Bisa diakses lewat / atau /beranda)
Route::get('/', [BerandaController::class, 'indexGuest'])->name('web.utama');
Route::get('/beranda', [BerandaController::class, 'indexGuest'])->name('beranda.publik');

// Autentikasi (Login & Register)
// Hapus kata 'backend/' di URL biar pengunjung liatnya cuma /login dan /register
Route::get('/login', [LoginController::class, 'loginBackend'])->name('login'); 
Route::post('/login', [LoginController::class, 'authenticateBackend'])->name('login.proses');
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

// Kategori & Detail Resep Publik
// Pengunjung biasa ngga perlu liat URL backend/makanan
Route::get('/makanan', [KategoriController::class, 'makanan'])->name('publik.makanan');
Route::get('/minuman', [KategoriController::class, 'minuman'])->name('publik.minuman');
Route::get('/dessert', [KategoriController::class, 'dessert'])->name('publik.dessert');
Route::get('/resep/detail/{id}', [RecipeController::class, 'detail'])->name('resep.detail');


// =========================================================
// 🔴 ZONA PRIVAT / ADMIN (Wajib Login)
// Otomatis nambah "/backend" di URL dan dijaga middleware 'auth'
// =========================================================
Route::prefix('backend')->middleware('auth')->group(function () {
    
    // URL jadinya: http://127.0.0.1:8000/backend/beranda
    Route::get('/beranda', [BerandaController::class, 'berandaBackend'])->name('backend.beranda');
    
    // URL jadinya: http://127.0.0.1:8000/backend/profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('backend.profile');
    
    // Manajemen Resep (Khusus Admin/User yang udah login)
    Route::get('/recipe', [RecipeController::class, 'index'])->name('backend.recipe');
    Route::get('/create', [CreateRecipeController::class, 'index'])->name('backend.create');
    Route::post('/recipe/store', [CreateRecipeController::class, 'store'])->name('backend.recipe.store');
    
    // Logout ditaruh di sini karena cuma orang yang udah login yang bisa logout
    Route::post('/logout', [LoginController::class, 'logoutBackend'])->name('backend.logout');

});