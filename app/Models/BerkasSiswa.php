<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BerkasSiswa extends Model
{
    protected $table = 'berkas_siswas';
    protected $fillable = [
        'siswa_id',
        'skl',
        'ijazah_sd',
        'ijazah_smp',
        'pasfoto',
        'kk',
        'akte',
        'lainnya',
    ];

    public function siswa(): BelongsTo
    {
        return $this->belongsTo(CalonSiswa::class, 'siswa_id', 'id');
    }
}
