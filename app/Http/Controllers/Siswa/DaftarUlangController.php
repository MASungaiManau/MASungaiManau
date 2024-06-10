<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\CalonSiswa;
use App\Models\DaftarUlang;
use App\Models\OrangTua;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DaftarUlangController extends Controller
{
    public function index(){
        $data['data'] = CalonSiswa::find(Auth::user()->id);
        $data['cekDaftarUlang'] = DaftarUlang::where('siswa_id', Auth::user()->id)->count('id');
        $data['daftarUlang'] = DaftarUlang::where('siswa_id', Auth::user()->id)->get()->first();
        $data['setting'] = Setting::get()->first();
        return view('pages.siswa.daftar-ulang', $data);
    }
    public function konfirmasiData($id){
        DaftarUlang::create([
            'siswa_id' => $id,
            'tanggal' => date('Y-m-d'),
            'status' => 'true'
        ]);
        return redirect()->back();
    }
    public function downloadFormulir($id){
        $data['data'] = CalonSiswa::find($id);
        $data['ortu'] = OrangTua::where('siswa_id', $id)->get()->first();
       return view('pages.siswa.cetak.cetak-formulir', $data);
    }
    // public function downloadFormulir($formulir){
    //     $path = public_path('berkas/formulir/'.$formulir);

    //     if(file_exists($path)){
    //         return response()->download($path);
    //     }else{
    //         return view('pages.404');
    //     }
    // }
}
