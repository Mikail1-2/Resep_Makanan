<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfileController;

Route::get('/', [BerandaController::class, 'berandaBackend'])->name('dashboard');
Route::get('backend/login', [LoginController::class, 'loginBackend'])->name('backend.login');
Route::post('backend/login', [LoginController::class, 'authenticateBackend'])->name('backend.login');
Route::post('backend/logout', [LoginController::class, 'logoutBackend'])->name('backend.logout');
Route::get('backend/register', [RegisterController::class, 'index'])->name('register');
Route::post('backend/register', [RegisterController::class, 'store'])->name('register.store');
Route::get('backend/beranda', [BerandaController::class, 'berandaBackend'])->name('backend.beranda');
Route::get('backend/profile', [ProfileController::class, 'index'])->middleware('auth')->name('backend.profile');