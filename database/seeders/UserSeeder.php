<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Bikin akun Admin
        User::create([
            'name' => 'Administrator',
            'username' => 'admin', 
            'email' => 'admin@estimasi.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        // Bikin akun User Biasa
        User::create([
            'name' => 'Pengguna Biasa',
            'username' => 'user01',
            'email' => 'user@estimasi.com',
            'password' => Hash::make('password123'),
            'role' => 'user',
        ]);
    }
}