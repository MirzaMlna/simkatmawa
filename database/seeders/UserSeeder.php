<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        DB::table('users')->insert([
            'name' => 'Admin',
            'identity_number' => '2210010156',
            'study_program' => 'Teknik Informatika',
            'phone' => '081234567890',
            'password' => Hash::make('password'),
            'role' => 'Admin',
            'is_approved' => true,
        ]);

        // Mahasiswa
        DB::table('users')->insert([
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
