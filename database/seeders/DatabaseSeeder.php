<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin Mitra',
            'email' => 'admin@mitra.com',
            'password' => Hash::make('123456789'),
            'no_wa' => '085123456789',
            'role' => 'admin',
        ]);
        // User::factory()->create([
        //     'name' => 'User  Mitra',
        //     'email' => 'user@mitra.com',
        //     'password' => Hash::make('123456789'),
        //     'no_wa' => '085123456789',
        //     'role' => 'user',
        // ]);
    }
}
