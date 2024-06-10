<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CalonSiswa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $data['jumlahPendaftar'] = CalonSiswa::count('id');
        $data['siswaDiterima'] = CalonSiswa::where('status' , 'Diterima')->count('id');
        $data['siswaDiverifikasi'] = CalonSiswa::where('status' , 'Diverifikasi')->count('id');
        $data['siswaDitolak'] = CalonSiswa::where('status' , 'Ditolak')->count('id');
        return view('pages.admin.dashboard', $data);
    }
}
