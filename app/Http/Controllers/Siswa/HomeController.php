<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\BerkasSiswa;
use App\Models\OrangTua;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $Ortu = OrangTua::where('siswa_id', Auth::user()->id)->count('id');
        $berkas = BerkasSiswa::where('siswa_id', Auth::user()->id)->count('id');
        if ($Ortu == 0) {
            OrangTua::create([
                'siswa_id' => Auth::user()->id
            ]);
        }
        if ($berkas == 0) {
            BerkasSiswa::create([
                'siswa_id' => Auth::user()->id
            ]);
        }

        return view('pages.siswa.home');
    }
}
