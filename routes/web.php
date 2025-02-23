<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Halaman Utama
Route::get('/', fn() => view('welcome'));

// Rute untuk autentikasi (login, register, dll)
require __DIR__.'/auth.php';

// Dashboard untuk Pengguna
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');

    // Dashboard Pengguna
    Route::get('/user/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
    Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');
    Route::post('/events/{event}/register', [RegistrationController::class, 'register'])->name('events.register');
});

// Rute Admin dengan Middleware
Route::middleware(['auth', 'verified'])->prefix('admin')->group(function () {
    // Dashboard Admin
    Route::get('/dashboard', function () {
        // Pastikan pengguna memiliki role 'admin'
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('user.dashboard'); // Redirect jika bukan admin
        }
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Manajemen Acara
    Route::resource('/events', EventController::class)->names([
        'index' => 'admin.event.list',
        'create' => 'admin.event.create',
        'store' => 'admin.event.store',
        'edit' => 'admin.event.edit',
        'update' => 'admin.event.update',
        'destroy' => 'admin.event.destroy'
    ]);

    // Daftar Pengguna
    Route::resource('/users', UserController::class)->names([
        'index' => 'admin.user.list',
        'edit' => 'admin.user.edit',
        'update' => 'admin.user.update',
        'destroy' => 'admin.user.destroy'
    ]);

    // Pendaftaran Acara
    Route::resource('/registrations', RegistrationController::class)->names([
        'index' => 'admin.registration.list',
        'edit' => 'admin.registration.edit',
        'update' => 'admin.registration.update',
        'destroy' => 'admin.registration.destroy'
    ]);

    // Profil Admin
    Route::resource('/profile', AdminProfileController::class)->only(['edit', 'update'])->names([
        'edit' => 'admin.profile',
        'update' => 'admin.profile.update'
    ]);
});

// Route untuk Profil Pengguna
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
