<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validasi data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|min:4|confirmed',
        ]);
    
        // Buat pengguna baru
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'petani', // default role petani
        ]);

    
        // Redirect ke halaman login jika berhasil
        return redirect()->route('login')->with('success', 'Akun berhasil dibuat. Silakan masuk.');
    }


    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validasi data
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
    
        // Coba melakukan login
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Jika berhasil, arahkan ke dashboard sesuai role
            if (Auth::user()->role === 'admin') {
                return redirect()->route('Dashboardadmin');
            } else {
                return redirect()->route('Dashboardpetani');
            }
        }
    
        // Jika gagal, kembali ke halaman login dengan pesan error
        return redirect()->route('login')->with('error', 'Invalid credentials');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect ('/login');
    }
}