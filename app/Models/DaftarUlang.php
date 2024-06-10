<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DaftarUlang extends Model
{
    protected $table = 'daftar_ulangs';
    protected $fillable = [
        'siswa_id',
        'tanggal',
        'status'
    ];
    
    public function siswa(): BelongsTo
    {
        return $this->belongsTo(CalonSiswa::class, 'siswa_id', 'id');
    }
}
