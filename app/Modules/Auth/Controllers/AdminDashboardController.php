<?php

namespace Modules\Auth\Controllers;

use App\Http\Controllers\Controller;
use Modules\Auth\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('auth::admin.dashboard', compact('users'));
    }

    public function updateRole(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|in:admin,user',
        ]);

        $user->update(['role' => $request->role]);

        return back()->with('success', 'Role user berhasil diubah.');
    }

    public function destroyUser(User $user)
    {
        $user->delete();
        return back()->with('success', 'User berhasil dihapus.');
    }
}