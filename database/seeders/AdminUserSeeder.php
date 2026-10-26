<?php

namespace Database\Seeders;

use Modules\Auth\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        // Buat akun Admin
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        // Buat akun User biasa
        User::create([
            'name' => 'Regular User',
            'email' => 'user@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'user',
        ]);
    }
}