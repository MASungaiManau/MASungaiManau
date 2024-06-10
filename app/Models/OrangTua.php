<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrangTua extends Model
{
    protected $table = 'orang_tuas';
    protected $fillable = [
        'siswa_id',
        'nama_ibu',
        'pendidikan_ibu',
        'pekerjaan_ibu',
        'penghasilan_ibu',
        'no_telp_ibu',
        'nama_ayah',
        'pendidikan_ayah',
        'pekerjaan_ayah',
        'penghasilan_ayah',
        'no_telp_ayah',
        'nama_wali',
        'pendidikan_wali',
        'pekerjaan_wali',
        'penghasilan_wali',
        'no_telp_wali',
    ];

    public function siswa(): BelongsTo
    {
        return $this->belongsTo(CalonSiswa::class, 'siswa_id', 'id');
    }
}
