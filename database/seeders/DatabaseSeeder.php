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
     * Password di-hash otomatis oleh cast 'hashed' pada model User.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'superadmin@example.com'],
            ['name' => 'Super Admin', 'password' => 'password123', 'role' => 'Super Admin']
        );

        User::updateOrCreate(
            ['email' => 'mitra@example.com'],
            ['name' => 'Mitra KHP', 'password' => 'password123', 'role' => 'mitra']
        );
    }
}
