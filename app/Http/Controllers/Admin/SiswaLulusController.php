<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CalonSiswa;
use App\Models\SiswaLulus;
use Illuminate\Http\Request;

class SiswaLulusController extends Controller
{
    public function index(){
        $data['siswa'] = SiswaLulus::with('siswa')->get();
        return view('pages.admin.data-siswa-lulus', $data);
    }
    public function formAdd(){
        $data['siswa'] = CalonSiswa::where('status', 'Diterima')->get();
        return view('pages.admin.form.form-add-siswa-lulus', $data);
    }
    public function add(Request $request){
        SiswaLulus::create([
            'siswa_id' => $request->siswa_id,
            'keterangan' => $request->keterangan,
            'tanggal' => date('Y-m-d'),
            'status' => 'Lulus'
        ]);
        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }
    public function delete($id){
        SiswaLulus::find($id)->delete();
        return redirect()->back();
    }

    // Ajax
    public function getSiswa(Request $request){
        $data = CalonSiswa::find($request->id);
        return response()->json($data);
    }
}
