<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     * Dicari berdasarkan username (unik), password di-hash otomatis oleh cast 'hashed'.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['username' => 'admin'],
            ['name' => 'Admin', 'email' => 'admin@email.com', 'password' => 'password123', 'role' => 'Super Admin']
        );

        User::updateOrCreate(
            ['username' => 'mitra'],
            ['name' => 'Mitra KHP', 'email' => 'mitra@gmail.com', 'password' => 'password123', 'role' => 'mitra']
        );
    }
}
