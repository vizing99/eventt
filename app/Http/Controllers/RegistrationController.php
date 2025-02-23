<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function register(Event $event)
    {
        // Pastikan pengguna belum terdaftar di acara ini
        $existingRegistration = Registration::where('event_id', $event->id)
                                             ->where('user_id', auth()->id())
                                             ->first();

        if ($existingRegistration) {
            return redirect()->route('user.dashboard')->with('error', 'Anda sudah terdaftar di acara ini.');
        }

        // Buat pendaftaran baru
        $registration = new Registration();
        $registration->event_id = $event->id;
        $registration->user_id = auth()->id();
        $registration->status = 'pending';
        $registration->save();

        return redirect()->route('user.dashboard')->with('success', 'Pendaftaran Anda berhasil.');
    }
}
