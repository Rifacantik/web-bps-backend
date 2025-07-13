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

        User::create([
            'name' => 'Ripoy',
            'email' => 'rifa1@gmail.com',
            'password' => Hash::make('ripoycantik'),
        ]);
    }
}