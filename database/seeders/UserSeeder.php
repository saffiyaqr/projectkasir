<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin Account
        User::create([
            'role_id' => 1, // admin
            'name' => 'Admin Kosmetik',
            'email' => 'admin@kosmetik.com',
            'password' => Hash::make('admin123'),
        ]);

        // User Accounts (2 akun)
        User::create([
            'role_id' => 2, // user
            'name' => 'Bella User',
            'email' => 'bella@kosmetik.com',
            'password' => Hash::make('user123'),
        ]);

        User::create([
            'role_id' => 2, // user
            'name' => 'Diana User',
            'email' => 'diana@kosmetik.com',
            'password' => Hash::make('user123'),
        ]);
    }
}