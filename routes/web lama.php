<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PemberkasanController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\KetuaController;


/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout']);

/*
|--------------------------------------------------------------------------
| Forgot Password / OTP
|--------------------------------------------------------------------------
*/

Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])
    ->name('password.request');

Route::post('/forgot-password', [AuthController::class, 'sendOtp'])
    ->name('password.email');

Route::get('/verify-otp', [AuthController::class, 'showVerifyOtp'])
    ->name('password.otp');

Route::post('/verify-otp', [AuthController::class, 'verifyOtp'])
    ->name('password.otp.verify');

Route::get('/reset-password', [AuthController::class, 'showResetPassword'])
    ->name('password.reset');

Route::post('/reset-password', [AuthController::class, 'resetPassword'])
    ->name('password.update');


/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
    ->middleware('auth')
    ->name('admin.dashboard');

/*
|--------------------------------------------------------------------------
| Pemberkasan Lama
|--------------------------------------------------------------------------
| Tetap dipertahankan sementara agar data/sistem lama tidak hilang.
|--------------------------------------------------------------------------
*/

Route::get('/admin/pemberkasan', [PemberkasanController::class, 'index'])
    ->middleware('auth');

Route::get('/admin/users', [AdminController::class, 'users'])
    ->middleware('auth')
    ->name('admin.users');

Route::get('/admin/users/create', [AdminController::class, 'createUser'])
    ->middleware('auth')
    ->name('admin.users.create');

Route::post('/admin/users', [AdminController::class, 'storeUser'])
    ->middleware('auth')
    ->name('admin.users.store');

Route::get('/admin/users/{id}/edit', [AdminController::class, 'editUser'])
    ->middleware('auth')
    ->name('admin.users.edit');

Route::put('/admin/users/{id}', [AdminController::class, 'updateUser'])
    ->middleware('auth')
    ->name('admin.users.update');

Route::patch('/admin/users/{id}/toggle-status', [AdminController::class, 'toggleUserStatus'])
    ->middleware('auth')
    ->name('admin.users.toggle-status');

Route::delete('/admin/users/{id}', [AdminController::class, 'deleteUser'])
    ->middleware('auth')
    ->name('admin.users.delete');

Route::get('/admin/pemeriksaan', [AdminController::class, 'pemeriksaan'])
    ->middleware('auth')
    ->name('admin.pemeriksaan');

Route::get('/admin/pemeriksaan/{id}', [AdminController::class, 'detailPemeriksaan'])
    ->middleware('auth')
    ->name('admin.pemeriksaan.detail');

Route::get('/admin/pemeriksaan/{id}/export', [AdminController::class, 'exportPemeriksaan'])
    ->middleware('auth')
    ->name('admin.pemeriksaan.export');

Route::get('/admin/laporan', [AdminController::class, 'laporan'])
    ->middleware('auth')
    ->name('admin.laporan');

Route::get('/admin/kategori-berkas', [AdminController::class, 'kategoriBerkas'])
    ->middleware('auth')
    ->name('admin.kategori-berkas');

Route::post('/admin/pemeriksaan/{id}/lha', [AdminController::class, 'storeLha'])
    ->middleware('auth')
    ->name('admin.pemeriksaan.lha.store');

Route::get('/admin/profil', function () {
    if (Auth::user()->role !== 'admin') {
        abort(403);
    }

    return view('admin.profil');
})->middleware('auth')->name('admin.profil');

Route::get('/admin/informasi-sistem', function () {
    if (Auth::user()->role !== 'admin') {
        abort(403);
    }

    return view('admin.informasi-sistem');
})->middleware('auth')->name('admin.informasi-sistem');


/*
|--------------------------------------------------------------------------
| Ketua Tim
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    // Dashboard Ketua Tim
    Route::get('/ketua/dashboard', [KetuaController::class, 'dashboard'])
        ->name('ketua.dashboard');

    Route::get('/ketua/pemberkasan', [KetuaController::class, 'pemberkasanMasuk'])
        ->name('ketua.pemberkasan');

    // Daftar Pemeriksaan
    Route::get('/ketua/pemeriksaan', [KetuaController::class, 'pemeriksaan'])
        ->name('ketua.pemeriksaan');

    // Form Buat Pemeriksaan
    Route::get('/ketua/pemeriksaan/create', [KetuaController::class, 'createPemeriksaan'])
        ->name('ketua.pemeriksaan.create');

    // Simpan Pemeriksaan
    Route::post('/ketua/pemeriksaan', [KetuaController::class, 'storePemeriksaan'])
        ->name('ketua.pemeriksaan.store');

    // Detail Pemeriksaan
    Route::get('/ketua/pemeriksaan/{id}', [KetuaController::class, 'detailPemeriksaan'])
        ->name('ketua.pemeriksaan.detail');

    Route::post('/ketua/dokumen/{id}/setujui', [KetuaController::class, 'setujuiDokumen'])
        ->middleware('auth')
        ->name('ketua.dokumen.setujui');

    Route::get('/ketua/riwayat-pemeriksaan', [KetuaController::class, 'riwayatPemeriksaan'])
        ->name('ketua.riwayat');

    Route::get('/ketua/anggota', [KetuaController::class, 'anggotaTeam'])
        ->name('ketua.anggota');

    Route::get('/ketua/profil', [KetuaController::class, 'profil'])
        ->name('ketua.profil');

    Route::post('/ketua/pemeriksaan/{id}/lha', [KetuaController::class, 'storeLha'])
        ->middleware('auth')
        ->name('ketua.pemeriksaan.lha.store');
});


/*
|--------------------------------------------------------------------------
| Anggota
|--------------------------------------------------------------------------
*/

Route::get('/anggota/dashboard', [AnggotaController::class, 'dashboard'])
    ->middleware('auth')
    ->name('anggota.dashboard');

Route::get('/anggota/pemeriksaan', [AnggotaController::class, 'pemeriksaan'])
    ->middleware('auth')
    ->name('anggota.pemeriksaan');

Route::get('/anggota/pemeriksaan/{id}', [AnggotaController::class, 'detailPemeriksaan'])
    ->middleware('auth')
    ->name('anggota.pemeriksaan.detail');

Route::get('/anggota/pemeriksaan/{id}/audit', [AnggotaController::class, 'audit'])
    ->middleware('auth')
    ->name('anggota.pemeriksaan.audit');

Route::post('/anggota/pemeriksaan/{id}/audit', [AnggotaController::class, 'storeAudit'])
    ->middleware('auth')
    ->name('anggota.pemeriksaan.audit.store');

Route::get('/anggota/pemeriksaan/{id}/reviu', [AnggotaController::class, 'reviu'])
    ->middleware('auth')
    ->name('anggota.pemeriksaan.reviu');

Route::post('/anggota/pemeriksaan/{id}/reviu', [AnggotaController::class, 'storeReviu'])
    ->middleware('auth')
    ->name('anggota.pemeriksaan.reviu.store');

Route::get('/anggota/riwayat-pemeriksaan', [AnggotaController::class, 'riwayatPemeriksaan'])
    ->middleware('auth')
    ->name('anggota.riwayat');

Route::get('/anggota/profil', [AnggotaController::class, 'profil'])
    ->middleware('auth')
    ->name('anggota.profil');

Route::get('/anggota/dokumen', [AnggotaController::class, 'dokumenSaya'])
    ->middleware('auth')
    ->name('anggota.dokumen');

Route::post(
    '/ketua/pemeriksaan/{pemeriksaanId}/anggota/{anggotaId}/minta-lengkapi',
    [KetuaController::class, 'mintaLengkapi']
)->middleware('auth')
 ->name('ketua.pemeriksaan.minta-lengkapi');

Route::post(
    '/anggota/permintaan/{id}/dibaca',
    [AnggotaController::class, 'tandaiPermintaanDibaca']
)->middleware('auth')
 ->name('anggota.permintaan.dibaca');

Route::get('/dashboard', function () {
    $user = Auth::user();

    if (!$user) {
        return redirect()->route('login');
    }

    return match ($user->role) {
        'admin' => redirect()->route('admin.dashboard'),
        'ketua' => redirect()->route('ketua.dashboard'),
        'anggota' => redirect()->route('anggota.dashboard'),
        default => abort(403),
    };
})->middleware('auth')->name('dashboard');
