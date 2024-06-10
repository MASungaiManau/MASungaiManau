<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Pengumuman;
use App\Models\SiswaLulus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengumumanController extends Controller
{
    public function index(){
        $data['pengumuman'] = SiswaLulus::where('siswa_id', Auth::user()->id)->get();
        return view('pages.siswa.pengumuman', $data);
    }
}
