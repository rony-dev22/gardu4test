<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Permintaan extends Model
{
    protected $table = 'permintaan';

    protected $fillable = [
        'pemeriksaan_id',
        'ketua_id',
        'anggota_id',
        'pesan',
        'status',
        'dibaca_pada',
    ];

    protected $casts = [
        'dibaca_pada' => 'datetime',
    ];

    /**
     * Pemeriksaan tempat request dibuat.
     */
    public function pemeriksaan(): BelongsTo
    {
        return $this->belongsTo(Pemeriksaan::class, 'pemeriksaan_id');
    }

    /**
     * Ketua yang mengirim request.
     */
    public function ketua(): BelongsTo
    {
        return $this->belongsTo(User::class, 'ketua_id');
    }

    /**
     * Anggota yang menerima request.
     */
    public function anggota(): BelongsTo
    {
        return $this->belongsTo(User::class, 'anggota_id');
    }
}