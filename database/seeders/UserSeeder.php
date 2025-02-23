<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Membuat user biasa
        User::create([
            'name' => 'User Example',
            'email' => 'user@gmail.com',
            'password' => Hash::make('user1234'),  // Gantilah password sesuai keinginan
            'role' => 'user',  // Pastikan role sesuai dengan apa yang sudah Anda tentukan di model User
        ]);

        // Membuat admin
        User::create([
            'name' => 'Admin Example',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),  // Gantilah password sesuai keinginan
            'role' => 'admin',  // Role admin
        ]);
    }
}
