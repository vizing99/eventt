<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{

    public function __construct()
    {
        // Pastikan hanya pengguna yang sudah login dan terverifikasi yang bisa mengakses
        // $this->middleware(['auth', 'verified']);

        // Middleware custom untuk memastikan hanya admin yang bisa mengakses
        // $this->middleware(function ($request, $next) {
        //     if (auth()->user()->role !== 'admin') {
        //         return redirect()->route('user.dashboard'); // Jika bukan admin, redirect ke dashboard user
        //     }
        //     return $next($request);
        // });
    }

    public function index()
    {
        // Ambil statistik yang diperlukan untuk dashboard
        $eventCount = Event::count(); // Jumlah acara
        $userCount = User::count(); // Jumlah pengguna terdaftar
        $latestEvent = Event::latest()->first(); // Acara terbaru

        // Kirim data ke tampilan dashboard
        return view('admin.dashboard', compact('eventCount', 'userCount', 'latestEvent'));
    }


}
