<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin Mitra',
            'email' => 'admin@mitra.com',
            'password' => Hash::make('123456789'),
            'no_wa' => '085123456789',
            'role' => 'admin',
        ]);
        User::create([
            'name' => 'User  Mitra',
            'email' => 'user@mitra.com',
            'password' => Hash::make('123456789'),
            'no_wa' => '085123456789',
            'role' => 'user',
        ]);
    }
}
