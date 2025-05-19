<?php

use App\Http\Controllers\AchievementController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

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
    Route::resource('achievements', AchievementController::class);
    Route::post('/user/{id}/approve', [UserController::class, 'approve'])->name('user.approve');
    // User End
    // Achievement Start
    Route::patch('/achievements/{id}/status/{status}', [AchievementController::class, 'updateStatus'])->name('achievements.updateStatus');
    // Achievement End
});

require __DIR__ . '/auth.php';
