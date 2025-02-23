<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;

// Halaman Utama
Route::get('/', function () {
    return view('welcome');
});

// Halaman Dashboard User (Hanya untuk pengguna yang sudah login)
Route::middleware(['auth', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Route untuk Profil Pengguna
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route Dashboard untuk Pengguna
Route::middleware('auth')->group(function () {
    // Menampilkan dashboard untuk pengguna
    Route::get('/user/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');

    // Menampilkan detail acara
    Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');

    // Melakukan pendaftaran acara
    Route::post('/events/{event}/register', [RegistrationController::class, 'register'])->name('events.register');
});

Route::middleware('auth', 'verified')->prefix('admin')->group(function () {
    // Route Dashboard Admin
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
});

// Memasukkan routes untuk autentikasi (login, register, dll)
require __DIR__.'/auth.php';
