<?php

use App\Exports\AchievementsExport;
use App\Http\Controllers\AchievementController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::get('/guide', function () {
    return view('auth.guide');
})->name('guide');


Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/not-approved', function () {
    return view('auth.not-approved');
})->name('not_approved');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // User Start
    Route::resource('users', UserController::class)->middleware(['auth', 'role:Admin']);
    Route::patch('/users/{user}/reset-password', [UserController::class, 'resetPassword'])
        ->middleware(['auth', 'role:Admin'])
        ->name('users.reset-password');
    Route::resource('achievements', AchievementController::class);
    Route::post('/user/{id}/approve', [UserController::class, 'approve'])
        ->middleware(['auth', 'role:Admin'])
        ->name('user.approve');
    // User End
    // Achievement Start
    Route::patch('/achievements/{id}/status/{status}', [AchievementController::class, 'updateStatus'])->name('achievements.updateStatus');
    Route::get('/achievements.export', function () {
        return Excel::download(new AchievementsExport, 'prestasi_mahasiswa.xlsx');
    });
    // Achievement End
});

Route::get('/run-migration', function (\Illuminate\Http\Request $request) {
    // Keamanan: Cek token agar tidak bisa diakses orang lain
    if ($request->token !== env('MIGRATION_TOKEN')) {
        abort(403, 'Unauthorized');
    }

    try {
        \Illuminate\Support\Facades\Artisan::call('migrate', ['--force' => true]);
        return 'Migration berhasil dijalankan otomatis oleh GitHub Actions! <br> Output: ' . \Illuminate\Support\Facades\Artisan::output();
    } catch (\Exception $e) {
        return 'Error: ' . $e->getMessage();
    }
});

require __DIR__ . '/auth.php';
