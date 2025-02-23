<?php

namespace Database\Seeders;

use App\Models\Registration;
use Illuminate\Database\Seeder;

class RegistrationsTableSeeder extends Seeder
{
    public function run()
    {
        // Mengambil ID acara dan ID pengguna untuk pendaftaran
        $event1 = \App\Models\Event::find(2); // Laravel Workshop
        $event2 = \App\Models\Event::find(3); // React Conference
        $user = \App\Models\User::where('role', 'user')->first(); // Pengguna biasa pertama

        // Mendaftarkan pengguna ke acara
        Registration::create([
            'event_id' => $event1->id,
            'user_id' => $user->id,
            'status' => 'confirmed', // Status pendaftaran
        ]);

        Registration::create([
            'event_id' => $event2->id,
            'user_id' => $user->id,
            'status' => 'pending', // Status pendaftaran
        ]);
    }
}

