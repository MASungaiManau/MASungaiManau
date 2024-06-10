<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CalonSiswa;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $data['siswa'] = CalonSiswa::all();
        return view('pages.admin.laporan', $data);
    }
    public function cetak(Request $request)
    {
        if ($request->status == 'all') {
            $data['siswa'] = CalonSiswa::all();
            $data['pria'] = CalonSiswa::where('jk', 'L')->count('id');
            $data['wanita'] = CalonSiswa::where('jk', 'P')->count('id');
        } else {
            $data['pria'] = CalonSiswa::where('jk', 'L')->where('status', $request->status)->count('id');
            $data['wanita'] = CalonSiswa::where('jk', 'P')->where('status', $request->status)->count('id');
            $data['siswa'] = CalonSiswa::where('status', $request->status)->get();
        }
        return view('pages.admin.cetak.cetak-laporan-siswa', $data);
    }

    // Ajax
    public function cariData(Request $request)
    {
        if ($request->status == 'all') {
            $data = CalonSiswa::all();
        } else {
            $data = CalonSiswa::where('status', $request->status)->get();
        }
        return response()->json($data);
    }
}
