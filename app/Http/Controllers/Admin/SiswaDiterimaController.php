<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CalonSiswa;
use App\Models\DaftarUlang;
use App\Models\OrangTua;
use Illuminate\Http\Request;

class SiswaDiterimaController extends Controller
{
    public function index()
    {
        $data['siswa'] = CalonSiswa::where('status', 'Diterima')->get();
        return view('pages.admin.data-siswa-diterima', $data);
    }
    public function detailSiswa($id)
    {
        $data['data'] = CalonSiswa::find($id);
        $data['ortu'] = OrangTua::where('siswa_id', $id)->get()->first();
        return view('pages.admin.detail-siswa', $data);
    }
    public function cancel($id)
    {
        CalonSiswa::find($id)->update([
            'status' => 'Ditolak'
        ]);

        DaftarUlang::where('siswa_id', $id)->delete();

        return redirect()->route('siswaDiterima');
    }
}
