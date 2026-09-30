<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pemeriksaan extends Model
{
    protected $table = 'pemeriksaan';

    protected $fillable = [
        'nama_pemeriksaan',
        'nomor_surat_tugas',
        'tanggal_mulai',
        'tanggal_selesai',
        'ketua_tim_id',
        'keterangan',
        'status',
    ];

    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
    ];

    /**
     * Ketua Tim yang memimpin pemeriksaan.
     */
    public function ketuaTim(): BelongsTo
    {
        return $this->belongsTo(User::class, 'ketua_tim_id');
    }

    /**
     * Anggota yang tergabung dalam pemeriksaan.
     */
    public function anggota(): HasMany
    {
        return $this->hasMany(PemeriksaanAnggota::class, 'pemeriksaan_id');
    }

    /**
     * Semua dokumen dalam pemeriksaan.
     */
    public function dokumen(): HasMany
    {
        return $this->hasMany(Dokumen::class, 'pemeriksaan_id');
    }

    /**
 * Semua request pada pemeriksaan ini.
 */
public function permintaan(): HasMany
{
    return $this->hasMany(Permintaan::class, 'pemeriksaan_id');
}

}