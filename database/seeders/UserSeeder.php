<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Muhammad Mirza Maulana',
                'password' => Hash::make('password'),
                'nim' => '2210010156',
                'study_program' => 'Teknik Informatika',
                'phone' => '085814313224',
                'role' => 'Admin Kemahasiswaan',
                'is_approved' => true,
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        DB::table('users')->insert([
            [
                'name' => 'Admin Fakultas',
                'password' => Hash::make('password'),
                'nim' => '2210010155',
                'study_program' => 'Teknik Informatika',
                'phone' => '085814313224',
                'role' => 'Admin Fakultas',
                'is_approved' => true,
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
