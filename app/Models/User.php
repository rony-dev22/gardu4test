<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;

#[Fillable(['name', 'email', 'password', 'role', 'is_active'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Pemberkasan lama.
     */
    public function pemberkasan(): HasMany
    {
        return $this->hasMany(Pemberkasan::class);
    }

    /**
     * Pemeriksaan yang dipimpin sebagai Ketua Tim.
     */
    public function pemeriksaanDipimpin(): HasMany
    {
        return $this->hasMany(Pemeriksaan::class, 'ketua_tim_id');
    }

    /**
     * Penugasan user sebagai anggota pemeriksaan.
     */
    public function pemeriksaanAnggota(): HasMany
    {
        return $this->hasMany(PemeriksaanAnggota::class, 'user_id');
    }

    /**
     * Dokumen yang diunggah oleh user.
     */
    public function dokumen(): HasMany
    {
        return $this->hasMany(Dokumen::class, 'user_id');
    }

    /**
     * Casting atribut.
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
 * Request yang dibuat sebagai Ketua.
 */
public function permintaanDibuat(): HasMany
{
    return $this->hasMany(Permintaan::class, 'ketua_id');
}

/**
 * Request yang diterima sebagai Anggota.
 */
public function permintaanDiterima(): HasMany
{
    return $this->hasMany(Permintaan::class, 'anggota_id');
}

}