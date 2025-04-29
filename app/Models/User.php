<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['nim', 'nidn', 'name', 'password', 'role', 'is_approved'];

    protected static function booted()
    {
        static::creating(function ($user) {
            // Mengisi data name, password, role, dan is_approved berdasarkan nim atau nidn
            if ($user->nim) {
                $student = \App\Models\Student::where('nim', $user->nim)->first();
                if ($student) {
                    $user->name = $student->name;
                    $user->role = $student->role;
                    $user->password = $student->password;
                    $user->is_approved = $student->is_approved;
                }
            }

            if ($user->nidn) {
                $admin = \App\Models\Admin::where('nidn', $user->nidn)->first();
                if ($admin) {
                    $user->name = $admin->name;
                    $user->role = $admin->role;
                    $user->password = $admin->password;
                    $user->is_approved = $admin->is_approved;
                }
            }
        });
    }
}
