<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Dokumen extends Model
{
    protected $table = 'dokumen';

    protected $fillable = [
        'pemeriksaan_id',
        'user_id',
        'jenis_dokumen',
        'nama_file',
        'file_path',
        'status',
        'catatan',
    ];

    /**
     * Pemeriksaan tempat dokumen ini dikumpulkan.
     */
    public function pemeriksaan(): BelongsTo
    {
        return $this->belongsTo(Pemeriksaan::class, 'pemeriksaan_id');
    }

    /**
     * User yang mengunggah dokumen.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}