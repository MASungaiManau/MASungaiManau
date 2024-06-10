<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DaftarUlang;
use Illuminate\Http\Request;

class SiswaDaftarUlangController extends Controller
{
    public function index(){
        $data['siswa'] = DaftarUlang::with('siswa')->get();
        return view('pages.admin.data-siswa-daftar-ulang', $data);
    }
}
