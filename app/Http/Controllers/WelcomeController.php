<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function index()
    {
        // Hitung total prestasi tercatat
        $achievementCount = Achievement::count();
        
        // Hitung total mahasiswa aktif (dengan role Mahasiswa)
        $activeStudentCount = User::where('role', 'Mahasiswa')
                                  ->where('is_approved', true)
                                  ->count();
        
        // Hitung jumlah kategori prestasi yang unik
        $achievementCategoryCount = Achievement::distinct('achievement_type')->count('achievement_type');
        
        // Hitung persentase prestasi yang terverifikasi
        $verifiedPercentage = 0;
        $totalAchievements = Achievement::count();
        
        if ($totalAchievements > 0) {
            $verifiedCount = Achievement::where('status', 'Terverifikasi')->count();
            $verifiedPercentage = round(($verifiedCount / $totalAchievements) * 100);
        }
        
        return view('welcome', compact(
            'achievementCount',
            'activeStudentCount',
            'achievementCategoryCount',
            'verifiedPercentage'
        ));
    }
}