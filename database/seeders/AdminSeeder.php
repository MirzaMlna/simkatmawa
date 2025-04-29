<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        DB::table('admins')->insert([
            'nidn' => '2210010156',
            'name' => 'Admin',
            'study_program' => 'Kemahasiswaan',
            'phone' => '081298765432',
            'password' => Hash::make('admin123'),
            'role' => 'Admin Fakultas',
            'is_approved' => true,
            'remember_token' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        User::create([
            'nidn' => '2210010156',
            // name, password, role, is_approved akan diisi otomatis oleh event `booted()`
        ]);
    }
}
