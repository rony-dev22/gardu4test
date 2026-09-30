<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;

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

    // Menampilkan halaman lupa password
    public function showForgotPassword()
    {
        return view('auth.forgot-password');
    }

    // Mengirim OTP ke email user
    public function sendOtp(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
        ]);

        $email = strtolower(trim($validated['email']));
        $user = User::where('email', $email)->first();

        /*
         * Pesan dibuat umum agar sistem tidak membocorkan
         * apakah sebuah email terdaftar atau tidak.
         */
        if (!$user) {
            return back()->with(
                'success',
                'Jika email tersebut terdaftar, kode OTP akan dikirim ke email Anda.'
            )->withInput();
        }

        $otp = (string) random_int(100000, 999999);
        $cacheKey = 'password_reset_otp:' . hash('sha256', $email);

        // OTP berlaku selama 10 menit
        Cache::put($cacheKey, $otp, now()->addMinutes(10));

        try {
            Mail::raw(
                "Kode OTP reset password GARDU4 Anda adalah: {$otp}\n\nKode ini berlaku selama 10 menit. Jangan berikan kode ini kepada siapa pun.",
                function ($message) use ($email) {
                    $message
                        ->to($email)
                        ->subject('Kode OTP Reset Password GARDU4');
                }
            );
        } catch (\Throwable $e) {
            Cache::forget($cacheKey);

            return back()
                ->withErrors([
                    'email' => 'Kode OTP gagal dikirim. Pastikan konfigurasi email sistem sudah benar.',
                ])
                ->withInput();
        }

        session([
            'password_reset_email' => $email,
        ]);

        return redirect()
            ->route('password.otp')
            ->with('success', 'Kode OTP telah dikirim ke email Anda.');
    }

    // Menampilkan halaman verifikasi OTP
    public function showVerifyOtp()
    {
        if (!session('password_reset_email')) {
            return redirect()->route('password.request');
        }

        return view('auth.verify-otp');
    }

    // Memverifikasi OTP
    public function verifyOtp(Request $request)
    {
        $validated = $request->validate([
            'otp' => 'required|digits:6',
        ], [
            'otp.required' => 'Kode OTP wajib diisi.',
            'otp.digits' => 'Kode OTP harus terdiri dari 6 angka.',
        ]);

        $email = session('password_reset_email');

        if (!$email) {
            return redirect()
                ->route('password.request')
                ->withErrors([
                    'email' => 'Sesi reset password sudah berakhir. Silakan mulai lagi.',
                ]);
        }

        $cacheKey = 'password_reset_otp:' . hash('sha256', $email);
        $storedOtp = Cache::get($cacheKey);

        if (!$storedOtp || !hash_equals((string) $storedOtp, (string) $validated['otp'])) {
            return back()->withErrors([
                'otp' => 'Kode OTP salah atau sudah kedaluwarsa.',
            ]);
        }

        // OTP sudah benar. Tandai email sebagai terverifikasi untuk reset.
        $verifiedKey = 'password_reset_verified:' . hash('sha256', $email);

        Cache::put(
            $verifiedKey,
            true,
            now()->addMinutes(10)
        );

        // OTP hanya boleh dipakai sekali.
        Cache::forget($cacheKey);

        return redirect()->route('password.reset');
    }

    // Menampilkan halaman password baru
    public function showResetPassword()
    {
        $email = session('password_reset_email');

        if (!$email) {
            return redirect()->route('password.request');
        }

        $verifiedKey = 'password_reset_verified:' . hash('sha256', $email);

        if (!Cache::get($verifiedKey)) {
            return redirect()
                ->route('password.otp')
                ->withErrors([
                    'otp' => 'Silakan verifikasi OTP terlebih dahulu.',
                ]);
        }

        return view('auth.reset-password');
    }

    // Menyimpan password baru
    public function resetPassword(Request $request)
    {
        $validated = $request->validate([
            'password' => 'required|min:8|confirmed',
        ], [
            'password.required' => 'Password baru wajib diisi.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak sama.',
        ]);

        $email = session('password_reset_email');

        if (!$email) {
            return redirect()->route('password.request');
        }

        $verifiedKey = 'password_reset_verified:' . hash('sha256', $email);

        if (!Cache::get($verifiedKey)) {
            return redirect()
                ->route('password.otp')
                ->withErrors([
                    'otp' => 'Sesi verifikasi sudah berakhir. Silakan minta OTP baru.',
                ]);
        }

        $user = User::where('email', $email)->first();

        if (!$user) {
            Cache::forget($verifiedKey);

            return redirect()
                ->route('password.request')
                ->withErrors([
                    'email' => 'Akun tidak ditemukan.',
                ]);
        }

        /*
         * User model sudah memakai cast 'hashed',
         * jadi password diberikan dalam bentuk plain text
         * dan Laravel akan melakukan hashing saat disimpan.
         */
        $user->password = $validated['password'];
        $user->save();

        Cache::forget($verifiedKey);
        session()->forget('password_reset_email');

        return redirect('/login')->with(
            'success',
            'Password berhasil diubah. Silakan login dengan password baru Anda.'
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
