<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function showLogin()
    {
        return view('auth.login');
    }

    // Proses login
   public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {

        $user = Auth::user();

        // Cek apakah akun masih aktif
        if (!$user->is_active) {
            Auth::logout();

            return back()->withErrors([
                'email' => 'Akun Anda sedang dinonaktifkan oleh Admin.',
            ])->onlyInput('email');
        }

        $request->session()->regenerate();

        if ($user->role === 'admin') {
            return redirect('/admin/dashboard');
        }

        if ($user->role === 'ketua') {
            return redirect('/ketua/dashboard');
        }

        return redirect('/anggota/dashboard');
    }

    return back()->withErrors([
        'email' => 'Email atau password salah.',
    ])->onlyInput('email');
}


    // Menampilkan halaman registrasi
    public function showRegister()
    {
        return view('auth.register');
    }


    // Proses registrasi
    public function register(Request $request)
    {
        // Validasi data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ], [
            'name.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak sama.',
        ]);

        // Membuat user baru
        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'],
            'role' => 'anggota',
        ]);

        // Kembali ke halaman login
        return redirect('/login')->with(
            'success',
            'Registrasi berhasil. Silakan login.'
        );
    }


    // Logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}