<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SiswaLulus extends Model
{
    protected $table = 'siswa_lulus';
    protected $fillable = [
        'siswa_id',
        'tanggal',
        'status',
        'keterangan',
    ];
   
    public function siswa(): BelongsTo
    {
        return $this->belongsTo(CalonSiswa::class, 'siswa_id', 'id');
    }
}
