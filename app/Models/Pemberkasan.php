<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pemberkasan extends Model
{
    protected $table = 'pemberkasan';

    protected $fillable = [
        'user_id',
        'kategori_berkas',
        'nama_file',
        'file_path',
        'status',
        'catatan',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}