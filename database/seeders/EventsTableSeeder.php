<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    public function run()
    {
        // Membuat beberapa acara dummy
        Event::create([
            'title' => 'Laravel Workshop',
            'description' => 'Workshop pengembangan aplikasi menggunakan Laravel.',
            'event_date' => now()->addDays(5), // 5 hari dari sekarang
            'location' => 'Jakarta, Indonesia',
            'user_id' => 1, // Admin yang membuat acara
        ]);

        Event::create([
            'title' => 'React Conference',
            'description' => 'Konferensi pengembangan front-end menggunakan React.',
            'event_date' => now()->addWeeks(2), // 2 minggu dari sekarang
            'location' => 'Bandung, Indonesia',
            'user_id' => 1, // Admin yang membuat acara
        ]);
    }
}
