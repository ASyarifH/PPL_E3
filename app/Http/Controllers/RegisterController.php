<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    // Menampilkan halaman registrasi
    public function index()
    {
        return view('auth.register');
    }

    // Menyimpan data registrasi baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Membuat user baru
        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Redirect ke halaman login setelah berhasil mendaftar
        return redirect('/login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    // Menampilkan data pengguna yang terdaftar
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('user.show', ['user' => $user]);
    }

    // Menampilkan halaman untuk mengedit data pengguna
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', ['user' => $user]);
    }

    // Menyimpan perubahan data pengguna
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        $user->update([
            'username' => $request->username,
            'email' => $request->email,
        ]);

        return redirect()->route('user.show', $user->id)->with('success', 'Data pengguna berhasil diperbarui.');
    }

    // Menghapus data pengguna
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/')->with('success', 'Data pengguna berhasil dihapus.');
    }
}
