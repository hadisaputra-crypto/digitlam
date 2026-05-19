<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'adminrepo@gmail.com',
            'password' => bcrypt('admin12345'),
            'role' => 'admin',
            'is_active' => true,
        ]);

        // Create dosen/mahasiswa users
        \App\Models\User::create([
            'name' => 'Dr. Ahmad Wijaya',
            'email' => 'ahmad@example.com',
            'password' => bcrypt('password'),
            'role' => 'dosen_mahasiswa',
            'is_active' => true,
        ]);

        \App\Models\User::create([
            'name' => 'Siti Nurhaliza',
            'email' => 'siti@example.com',
            'password' => bcrypt('password'),
            'role' => 'dosen_mahasiswa',
            'is_active' => true,
        ]);

        \App\Models\User::create([
            'name' => 'Budi Santoso',
            'email' => 'budi@example.com',
            'password' => bcrypt('password'),
            'role' => 'dosen_mahasiswa',
            'is_active' => true,
        ]);

        // Create guest users
        \App\Models\User::create([
            'name' => 'Guest User',
            'email' => 'guest@example.com',
            'password' => bcrypt('password'),
            'role' => 'guest',
            'is_active' => true,
        ]);
    }
}
