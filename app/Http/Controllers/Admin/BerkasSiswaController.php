<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BerkasSiswa;
use Illuminate\Http\Request;

class BerkasSiswaController extends Controller
{
    public function index(){
        $data['berkas'] = BerkasSiswa::with('siswa')->get();
        return view('pages.admin.data-berkas', $data);
    }
}
