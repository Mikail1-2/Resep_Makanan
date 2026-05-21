<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\CreateRecipeController;
use App\Http\Controllers\KategoriController;

Route::get('/', [BerandaController::class, 'indexGuest'])->name('web.utama');
Route::get('backend/login', [LoginController::class, 'loginBackend'])->name('backend.login');
Route::post('backend/login', [LoginController::class, 'authenticateBackend'])->name('backend.login');
Route::post('backend/logout', [LoginController::class, 'logoutBackend'])->name('backend.logout');
Route::get('backend/register', [RegisterController::class, 'index'])->name('register');
Route::post('backend/register', [RegisterController::class, 'store'])->name('register.store');
Route::get('backend/beranda', [BerandaController::class, 'berandaBackend'])->name('backend.beranda');
Route::get('backend/profile', [ProfileController::class, 'index'])->middleware('auth')->name('backend.profile');
Route::get('backend/recipe', [RecipeController::class, 'index'])->name('backend.recipe');
Route::get('backend/create', [CreateRecipeController::class, 'index'])->name('backend.create');
Route::post('backend/recipe/store', [CreateRecipeController::class, 'store'])->name('backend.recipe.store');
Route::get('backend/makanan', [KategoriController::class, 'makanan'])->name('backend.makanan');
Route::get('backend/minuman', [KategoriController::class, 'minuman'])->name('backend.minuman');
Route::get('backend/dessert', [KategoriController::class, 'dessert'])->name('backend.dessert');
