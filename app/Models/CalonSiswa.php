<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalonSiswa extends Model
{
    protected $table = 'calon_siswas';
    protected $fillable = [
        'jenis',
        'no_pendaftaran',
        'tanggal',
        'nik',
        'no_kk',
        'nama',
        'tempat_lahir',
        'tgl_lahir',
        'jk',
        'no_telp',
        'asal_sekolah',
        'alamat',
        'desa',
        'kecamatan',
        'kabupaten',
        'provinsi',
        'kode_pos',
        'username',
        'status',
        'password',
        'foto',
    ];
    protected $hidden = [
        'password',
        'remember_token'
    ];
}
