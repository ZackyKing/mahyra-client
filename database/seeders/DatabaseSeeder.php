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
     */
    public function run(): void
    {
        // Create admin user for testing
        // Can login with email: admin@admin.com or just "admin" and password: admin
        User::firstOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => \Illuminate\Support\Facades\Hash::make('admin'),
            ]
        );

        // Also create a user with email "admin" for convenience
        User::firstOrCreate(
            ['email' => 'admin'],
            [
                'name' => 'Admin',
                'email' => 'admin',
                'password' => \Illuminate\Support\Facades\Hash::make('admin'),
            ]
        );
    }
}
