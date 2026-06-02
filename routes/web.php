<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\CreateRecipeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ForgotPasswordController;


/*
|--------------------------------------------------------------------------
| 1. ZONA BEBAS (PUBLIK) - Tamu tidak akan dilempar ke halaman login
|--------------------------------------------------------------------------
*/

// Beranda Utama
Route::get('/', [BerandaController::class, 'indexGuest'])->name('web.utama');

// Halaman Kategori & Resep
Route::get('/makanan', [KategoriController::class, 'makanan'])->name('publik.makanan');
Route::get('/minuman', [KategoriController::class, 'minuman'])->name('publik.minuman');
Route::get('/dessert', [KategoriController::class, 'dessert'])->name('publik.dessert');
Route::get('/recipe', [RecipeController::class, 'index'])->name('publik.recipe');
Route::get('/resep/detail/{id}', [RecipeController::class, 'detail'])->name('resep.detail');

// Autentikasi (URL diubah dari 'backend/login' menjadi '/login' agar standar)
Route::get('/login', [LoginController::class, 'loginBackend'])->name('login');
Route::post('/login', [LoginController::class, 'authenticateBackend'])->name('login.proses');
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Forgot Password
Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])->name('forgot.password');
Route::post('/forgot-password', [ForgotPasswordController::class, 'kirim'])->name('password.email');

/*
|--------------------------------------------------------------------------
| 2. ZONA TERLARANG (AUTH) - Wajib Login
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    // Halaman khusus setelah login
    Route::get('/beranda', [BerandaController::class, 'berandaUser'])->name('user.beranda');
    Route::get('backend/beranda', [BerandaController::class, 'berandaBackend'])->name('backend.beranda');

    Route::get('/profile', [ProfileController::class, 'index'])->name('frontend.profile');

    // Fitur Create Recipe
    Route::get('/create', [CreateRecipeController::class, 'index'])->name('frontend.create');
    Route::post('/recipe/store', [CreateRecipeController::class, 'store'])->name('recipe.store');

    Route::get('/approval',[RecipeController::class, 'approval'])->name('backend.approval');
    Route::post('/approval/{id}/approve',[RecipeController::class, 'approve'])->name('backend.approve');
});
