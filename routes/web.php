<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/not-approved', function () {
    return view('auth.not-approved');
})->name('not_approved');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // User Start
    Route::resource('users', UserController::class)->middleware(['auth', 'role:Admin']);
    Route::post('/user/{id}/approve', [UserController::class, 'approve'])->name('user.approve');
    // User End
});

require __DIR__ . '/auth.php';
