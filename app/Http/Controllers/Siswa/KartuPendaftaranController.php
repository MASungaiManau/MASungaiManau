<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\CalonSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KartuPendaftaranController extends Controller
{
    public function index(){
        $data['data'] = CalonSiswa::find(Auth::user()->id);
        return view('pages.siswa.kartu-pendaftaran', $data);
    }
    public function cetakKartuPendaftaran($id){
        $data['data'] = CalonSiswa::find($id);
        return view('pages.siswa.cetak.cetak-kartu-pendaftaran', $data);
    }
}
