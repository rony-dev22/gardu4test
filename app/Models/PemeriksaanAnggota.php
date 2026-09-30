<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PemeriksaanAnggota extends Model
{
    protected $table = 'pemeriksaan_anggota';

    protected $fillable = [
        'pemeriksaan_id',
        'user_id',
        'jenis_pekerjaan',
        'status',
    ];

    /**
     * Pemeriksaan yang diikuti oleh anggota.
     */
    public function pemeriksaan(): BelongsTo
    {
        return $this->belongsTo(Pemeriksaan::class, 'pemeriksaan_id');
    }

    /**
     * User/anggota yang ditugaskan.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}