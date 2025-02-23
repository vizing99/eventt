<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Ambil statistik yang diperlukan untuk dashboard
        $eventCount = Event::count(); // Jumlah acara
        $userCount = User::count(); // Jumlah pengguna terdaftar
        $latestEvent = Event::latest()->first(); // Acara terbaru

        // Kirim data ke tampilan dashboard
        return view('admin.dashboard', compact('eventCount', 'userCount', 'latestEvent'));
    }

    public function __construct()
{
    $this->middleware('auth');
    $this->middleware(function ($request, $next) {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('user.dashboard');
        }
        return $next($request);
    });
}

}
