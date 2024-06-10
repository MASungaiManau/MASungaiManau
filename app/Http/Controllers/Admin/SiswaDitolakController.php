<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BerkasSiswa;
use App\Models\CalonSiswa;
use App\Models\OrangTua;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SiswaDitolakController extends Controller
{
    public function index()
    {
        $data['siswa'] = CalonSiswa::where('status', 'Ditolak')->get();
        return view('pages.admin.data-siswa-ditolak', $data);
    }
    public function delete($id)
    {
        $data = CalonSiswa::find($id);
        $data = BerkasSiswa::where('siswa_id', $id)->get()->first();

        File::delete(public_path('img/' . $data->foto));
        File::delete(public_path('berkas/' . $data->kk));
        File::delete(public_path('berkas/' . $data->akta));
        File::delete(public_path('berkas/' . $data->ijazah));
        File::delete(public_path('berkas/' . $data->transkip_nilai));

        OrangTua::where('siswa_id', $id)->delete();
        BerkasSiswa::where('siswa_id', $id)->delete();
        CalonSiswa::find($id)->delete();

        return redirect()->back();
    }
}
