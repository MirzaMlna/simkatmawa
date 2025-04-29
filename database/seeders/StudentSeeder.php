<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    public function run()
    {
        DB::table('students')->insert([
            'nim' => '2210010155',
            'name' => 'Mahasiswa',
            'study_program' => 'Informatika',
            'phone' => '081234567890',
            'password' => Hash::make('password'),
            'role' => 'Mahasiswa',
            'is_approved' => true,
            'remember_token' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        User::create([
            'nim' => '2210010155',
            // name, password, role, is_approved akan diisi otomatis oleh event `booted()`
        ]);
    }
}
