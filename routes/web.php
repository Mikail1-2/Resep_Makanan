<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
// return view('welcome');
    return redirect()->route('backend.login');
});
Route::get('backend/login', [LoginController::class, 'loginBackend'])->name('backend.login');
Route::post('backend/login', [LoginController::class, 'authenticateBackend'])->name('backend.login');
Route::post('backend/logout', [LoginController::class, 'logoutBackend'])->name('backend.logout');
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
Route::get('backend/beranda', [BerandaController::class, 'berandaBackend'])->name('backend.beranda');