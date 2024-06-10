<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\CalonSiswa;
use App\Models\OrangTua;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class FormulirController extends Controller
{
    public function index()
    {
        $data['data'] = CalonSiswa::find(Auth::user()->id);
        $data['ortu'] = OrangTua::where('siswa_id', Auth::user()->id)->get()->first();
        return view('pages.siswa.formulir', $data);
    }
    public function updateDataDiri(Request $request, $id)
    {
        CalonSiswa::find($id)->update([
            'no_kk' => $request->no_kk,
            'nik' => $request->nik,
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'jk' => $request->jk,
            'no_telp' => $request->no_telp,
            'asal_sekolah' => $request->asal_sekolah,
        ]);

        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }
    public function updateAlamat(Request $request, $id)
    {
        CalonSiswa::find($id)->update([
            'alamat' => $request->alamat,
            'desa' => $request->desa,
            'kecamatan' => $request->kecamatan,
            'kabupaten' => $request->kabupaten,
            'provinsi' => $request->provinsi,
            'kode_pos' => $request->kode_pos,
        ]);

        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }
    public function updateOrangTua(Request $request, $id)
    {
        OrangTua::find($id)->update([
            'nama_ibu' => $request->nama_ibu,
            'pendidikan_ibu' => $request->pendidikan_ibu,
            'pekerjaan_ibu' => $request->pekerjaan_ibu,
            'penghasilan_ibu' => $request->penghasilan_ibu,
            'no_telp_ibu' => $request->no_telp_ibu,
            'nama_ayah' => $request->nama_ayah,
            'pendidikan_ayah' => $request->pendidikan_ayah,
            'pekerjaan_ayah' => $request->pekerjaan_ayah,
            'penghasilan_ayah' => $request->penghasilan_ayah,
            'no_telp_ayah' => $request->no_telp_ayah,
            'nama_wali' => $request->nama_wali,
            'pendidikan_wali' => $request->pendidikan_wali,
            'pekerjaan_wali' => $request->pekerjaan_wali,
            'penghasilan_wali' => $request->penghasilan_wali,
            'no_telp_wali' => $request->no_telp_wali,
        ]);

        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }
    public function updateFoto(Request $request, $id)
    {
        $data = CalonSiswa::find($id);
        File::delete(public_path('img/' . $data->foto));

        $foto = $request->file('foto');
        $fotoName = 'Siswa_' . uniqid() . '.' . $foto->getClientOriginalExtension();
        $foto->move('img', $fotoName);

        CalonSiswa::find($id)->update([
            'foto' => $fotoName
        ]);

        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }
    public function updateSetting(Request $request, $id)
    {
        if ($request->password) {
            if ($request->password == $request->konfirmasi_password) {
                CalonSiswa::find($id)->update([
                    'username' => $request->username,
                    'password' => Hash::make($request->password)
                ]);

                return redirect()->back()->with('success', 'Data berhasil disimpan!');
            } else {
                return redirect()->back()->with('error', 'Password yang Anda Masukkan Tidak Sama!');
            }
        } else {
            CalonSiswa::find($id)->update([
                'username' => $request->username,
            ]);

            return redirect()->back()->with('success', 'Data berhasil disimpan!');
        }
    }
}
