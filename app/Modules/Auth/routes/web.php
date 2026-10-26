<?php

use Illuminate\Support\Facades\Route;
use Modules\Auth\Controllers\AuthController;

Route::middleware('web')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');

    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', function () {
            return view('auth::dashboard');
        })->name('dashboard');

        Route::post('/profile/update', [AuthController::class, 'updateProfile'])->name('profile.update');

        // Route Admin Dashboard
        Route::get('/admin/dashboard', function () {
            if (auth()->user()->role !== 'admin') {
                abort(403, 'Unauthorized action.');
            }
            
            $userClass = class_exists(\Modules\Auth\Models\User::class) 
                ? \Modules\Auth\Models\User::class 
                : \App\Models\User::class;

            $users = $userClass::all();
            return view('auth::admin.dashboard', compact('users'));
        })->name('admin.dashboard');

        // Route Update Role
        Route::post('/admin/users/{user}/role', function ($user) {
            $userClass = class_exists(\Modules\Auth\Models\User::class) 
                ? \Modules\Auth\Models\User::class 
                : \App\Models\User::class;

            $userData = $userClass::findOrFail($user);
            $userData->update(['role' => request('role')]);
            return back()->with('success', 'Role berhasil diperbarui!');
        })->name('admin.users.updateRole');

        // Route Hapus User (admin.users.destroy)
        Route::delete('/admin/users/{user}', function ($user) {
            $userClass = class_exists(\Modules\Auth\Models\User::class) 
                ? \Modules\Auth\Models\User::class 
                : \App\Models\User::class;

            $userData = $userClass::findOrFail($user);
            $userData->delete();
            return back()->with('success', 'User berhasil dihapus!');
        })->name('admin.users.destroy');
    });
});