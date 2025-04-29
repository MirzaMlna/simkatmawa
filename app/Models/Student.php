<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    // Tentukan nama tabel jika tidak sesuai konvensi
    protected $table = 'students';

    // Tentukan kolom yang bisa diisi massal
    protected $fillable = [
        'nim',
        'name',
        'study_program',
        'phone',
        'password',
        'role',
        'is_approved',
        'remember_token'
    ];

    // Jika kamu ingin menggunakan mutator untuk menyimpan password secara aman
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    // Relasi ke tabel User
    public function user()
    {
        return $this->belongsTo(User::class, 'nim', 'nim');
    }
}
