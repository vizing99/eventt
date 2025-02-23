<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Memanggil seeder untuk Users, Events, dan Registrations
        $this->call([
            EventsTableSeeder::class,
            RegistrationsTableSeeder::class,
        ]);
    }
}
