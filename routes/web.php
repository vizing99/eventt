<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\UserController;

// Halaman Utama
Route::get('/', function () {
    return view('welcome');
});

// Halaman Dashboard User (Hanya untuk pengguna yang sudah login dan terverifikasi)
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

// Rute untuk Admin - menggunakan middleware auth dan verified
Route::middleware(['auth', 'verified'])->prefix('admin')->group(function () {
    // Route Dashboard Admin
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    // Manajemen Acara
    Route::get('/events', [EventController::class, 'index'])->name('admin.event.list');
    Route::get('/events/create', [EventController::class, 'create'])->name('admin.event.create');
    Route::post('/events', [EventController::class, 'store'])->name('admin.event.store');
    Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('admin.event.edit');
    Route::put('/events/{event}', [EventController::class, 'update'])->name('admin.event.update');
    Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('admin.event.destroy');

    // Daftar Pengguna
    Route::get('/users', [UserController::class, 'index'])->name('admin.user.list');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('admin.user.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('admin.user.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('admin.user.destroy');

    // Daftar Pendaftaran Acara
    Route::get('/registrations', [RegistrationController::class, 'index'])->name('admin.registration.list');
    Route::get('/registrations/{registration}/edit', [RegistrationController::class, 'edit'])->name('admin.registration.edit');
    Route::put('/registrations/{registration}', [RegistrationController::class, 'update'])->name('admin.registration.update');
    Route::delete('/registrations/{registration}', [RegistrationController::class, 'destroy'])->name('admin.registration.destroy');

    // Profil Admin
    Route::get('/profile', [AdminProfileController::class, 'edit'])->name('admin.profile');
    Route::put('/profile', [AdminProfileController::class, 'update'])->name('admin.profile.update');
});

// Memasukkan routes untuk autentikasi (login, register, dll)
require __DIR__.'/auth.php';
