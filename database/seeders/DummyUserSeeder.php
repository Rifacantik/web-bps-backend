<?php

namespace Database\Seeders;

use App\Models\User; 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DummyUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Hapus semua user lama
        User::truncate();

        // Menambahkan user dummy
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);

        // Menambahkan beberapa user dummy lainnya
        User::create([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => Hash::make('password123'),
        ]);

        User::create([
            'name' => 'Jane Smith',
            'email' => 'janesmith@example.com',
            'password' => Hash::make('password456'),
        ]);

        User::create([
            'name' => 'Ripoy',
            'email' => 'ripoy@email.com',
            'password' => Hash::make('ripoycantik'),
        ]);
    }
}