<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Tambahkan beberapa pengguna dengan atribut role
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'level' => 'admin'
        ]);
        User::create([
            'name' => 'Bendahara',
            'email' => 'bendahara@gmail.com',
            'password' => Hash::make('bendahara'),
            'level' => 'bendahara'
        ]);
        User::create([
            'name' => 'Pelanggan',
            'email' => 'pelanggan@gmail.com',
            'password' => Hash::make('pelanggan'),
            'level' => 'pelanggan'
        ]);
        User::create([
            'name' => 'Owner',
            'email' => 'owner@gmail.com',
            'password' => Hash::make('owner'),
            'level' => 'pemilik'
        ]);
    }
}
