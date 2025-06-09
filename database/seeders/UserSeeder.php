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
        // Bapak Yusup
        DB::table('users')->insert([
            'name' => 'Yusup Indra Wijaya, S.Kom., M.Kom.',
            'identity_number' => '1126128602',
            'study_program' => 'Kemahasiswaan',
            'phone' => '085259004449',
            'password' => Hash::make('password'),
            'role' => 'Admin',
            'is_approved' => true,
        ]);
    }
}
