<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        // akun admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('1234'),
            'role' => 'admin',
        ]);

        // akun petani 1
        User::create([
            'name' => 'Petani 1',
            'email' => 'petani1@example.com',
            'password' => Hash::make('1122'),
            'role' => 'petani',
        ]);

        // akun petani 2
        User::create([
            'name' => 'Petani 2',
            'email' => 'petani2@example.com',
            'password' => Hash::make('3344'),
            'role' => 'petani',
        ]);
    }
}
