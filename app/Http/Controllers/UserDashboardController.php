<?php

// app/Http/Controllers/UserDashboardController.php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function index()
    {
        // Ambil semua acara yang belum didaftarkan oleh pengguna
        $events = Event::whereDoesntHave('registrations', function ($query) {
            $query->where('user_id', auth()->id());
        })->get();

        return view('user.dashboard', compact('events'));
    }
}

