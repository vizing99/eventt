<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Memastikan hanya admin yang bisa mengakses
    }

    // Menampilkan daftar pengguna
    public function index()
    {
        $users = User::all(); // Mengambil semua pengguna
        return view('admin.user-list', compact('users'));
    }

    // Menampilkan halaman edit pengguna
    public function edit(User $user)
    {
        return view('admin.user-edit', compact('user'));
    }

    // Memperbarui data pengguna
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required|in:admin,user',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;

        // Jika password diubah, lakukan hashing
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('admin.user.list')->with('success', 'Pengguna berhasil diperbarui.');
    }

    // Menghapus pengguna
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.user.list')->with('success', 'Pengguna berhasil dihapus.');
    }
}
