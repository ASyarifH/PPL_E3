<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use App\Notifications\ResetPasswordNotification;
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
            'password' => 'required|string|min:8|confirmed',
        ]);
    
        // Buat pengguna baru
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'petani', // default role petani
        ]);

    
        // Redirect ke halaman login jika berhasil
        return redirect()->route('login')->with('success', 'Akun berhasil dibuat.');
    }


    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Jika pengguna sudah login, arahkan ke halaman yang sesuai berdasarkan peran mereka
        if (Auth::check()) {
            if (Auth::user()->role === 'admin') {
                return redirect()->route('Dashboardadmin');
            } elseif (Auth::user()->role === 'petani') {
                return redirect()->route('Dashboardpetani');
            }
        }

        // Validasi data
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Coba melakukan login
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Setel peran pengguna ke sesi
            session(['role' => Auth::user()->role]);

            // Redirect ke dashboard sesuai peran
            if (Auth::user()->role === 'admin') {
                return redirect()->route('Dashboardadmin');
            } elseif (Auth::user()->role === 'petani') {
                return redirect()->route('Dashboardpetani');
            }
        }

        // Jika gagal, kembali ke halaman login dengan pesan error
        return back()->withErrors(['loginError' => 'Email atau password salah.']);
    }

    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    public function forgotPassword(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email',
        ]);
    
        $user = User::where('name', $request->name)->where('email', $request->email)->first();
    
        if (!$user) {
            return back()->withErrors(['message' => 'Username atau Email tidak ada dalam database.']);
        }

        // Generate a password reset token
        $token = Password::createToken($user);
    
        // Redirect to the reset password form with the token
        return redirect()->route('reset-password', ['token' => $token, 'email' => $request->email, 'name' => $request->name]);
    }

    public function showResetPasswordForm(Request $request, $token)
    {
        return view('auth.reset-password', ['token' => $token, 'email' => $request->email, 'name' => $request->name]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'password.confirmed' => 'Kedua password tidak sama.'
        ]);
    
        $credentials = $request->only('name', 'email', 'password', 'password_confirmation', 'token');
    
        $status = Password::reset(
            $credentials,
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->save();
            }
        );
    
        if ($status == Password::PASSWORD_RESET) {
            return redirect()->route('login')->with('success', 'password berhasil diubah.');
        } else {
            return back()->withErrors(['message' => 'Password dan konfirmasi password tidak cocok.']);
        }
    }

    public function showProfileAdmin()
    {
        $user = Auth::user();
        return view('auth.akunA', compact('user'));
    }

    public function showProfilePetani()
    {
        $user = Auth::user();
        return view('auth.akunP', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = $request->user();
    
        // Validasi data dari formulir
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            // Tambahkan validasi untuk kolom lainnya sesuai kebutuhan
        ]);
    
        // Panggil method updateUser() dari model User
        $user->updateUser($validatedData);
    
        return back();
    }
     
    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}