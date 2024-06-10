<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BerkasSiswa;
use App\Models\CalonSiswa;
use App\Models\DaftarUlang;
use App\Models\OrangTua;
use App\Models\Pembayaran;
use App\Models\SiswaLulus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PendaftarController extends Controller
{
    public function index()
    {
        $data['pendaftar'] = CalonSiswa::all();
        return view('pages.admin.data-pendaftar', $data);
    }
    public function updateStatus(Request $request, $id)
    {
        CalonSiswa::find($id)->update([
            'status' => $request->status
        ]);
        return redirect()->back();
    }
    public function delete($id)
    {
        $data = CalonSiswa::find($id);
        $berkas = BerkasSiswa::where('siswa_id', $id)->get()->first();
        $pembayaran = Pembayaran::where('siswa_id', $id)->get()->first();

        if($berkas){
            File::delete(public_path('berkas/formulir/' . $berkas->skl));
            File::delete(public_path('berkas/formulir/' . $berkas->ijazah_sd));
            File::delete(public_path('berkas/formulir/' . $berkas->ijazah_smp));
            File::delete(public_path('berkas/formulir/' . $berkas->pasfoto));
            File::delete(public_path('berkas/formulir/' . $berkas->kk));
            File::delete(public_path('berkas/formulir/' . $berkas->akte));
            File::delete(public_path('berkas/formulir/' . $berkas->lainnya));
        }

        BerkasSiswa::where('siswa_id', $id)->delete();
        DaftarUlang::where('siswa_id', $id)->delete();
        OrangTua::where('siswa_id', $id)->delete();

        if($pembayaran){
            File::delete(public_path('bukti/' . $pembayaran->bukti));
        }

        Pembayaran::where('siswa_id', $id)->delete();
        SiswaLulus::where('siswa_id', $id)->delete();

        File::delete(public_path('img/' . $data->foto));

        CalonSiswa::find($id)->delete();

        return redirect()->back()->with('success', 'Berhasil');
    }
}
