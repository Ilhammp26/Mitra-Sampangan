<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Lapangan;
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
        // Seed the single lapangan
        Lapangan::create([
            'nama'      => 'Lapangan Futsal Mitra Sampangan',
            'jam_buka'  => '06:00:00',
            'jam_tutup' => '23:00:00',
            'status'    => 'Tersedia',
            'harga'     => 100000, // Rp 100.000/jam — adjust as needed
        ]);

        User::factory()->create([
            'name'     => 'Admin Mitra',
            'email'    => 'admin@mitra.com',
            'password' => Hash::make('123456789'),
            'no_wa'    => '085123456789',
            'role'     => 'admin',
        ]);
        User::factory()->create([
            'name'     => 'User  Mitra',
            'email'    => 'user@mitra.com',
            'password' => Hash::make('123456789'),
            'no_wa'    => '085123456789',
            'role'     => 'user',
        ]);
    }
}
