<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin',
            'identity_number' => '2210010156',
            'study_program' => 'Teknik Informatika',
            'phone' => '081234567890',
            'password' => Hash::make('password'),
            'role' => 'Admin',
            'is_approved' => true,
        ]);

        // Mahasiswa
        User::create([
            'name' => 'Mahasiswa',
            'identity_number' => '2210010155',
            'study_program' => 'Sistem Informasi',
            'phone' => '081298765432',
            'password' => Hash::make('password'),
            'role' => 'Mahasiswa',
            'is_approved' => true,
        ]);
    }
}
