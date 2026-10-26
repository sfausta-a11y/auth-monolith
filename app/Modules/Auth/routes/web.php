<?php

use Illuminate\Support\Facades\Route;
use Modules\Auth\Controllers\AuthController;
use Modules\Auth\Controllers\AdminDashboardController;

// Route Guest (Belum Login)
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');

    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});

// Route Autentikasi (Sudah Login)
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Route User Biasa
    Route::get('/dashboard', function () {
        return view('auth::dashboard');
    })->name('dashboard');
    
    Route::put('/profile', [AuthController::class, 'updateProfile'])->name('profile.update');

    // Route khusus Admin (Protected by RoleMiddleware)
    Route::middleware('role:admin')->prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        Route::patch('/users/{user}/role', [AdminDashboardController::class, 'updateRole'])->name('admin.users.updateRole');
        Route::delete('/users/{user}', [AdminDashboardController::class, 'destroyUser'])->name('admin.users.destroy');
    });
});