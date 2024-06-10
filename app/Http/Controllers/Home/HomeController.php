<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\CalonSiswa;
use App\Models\Pengumuman;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function home()
    {
        $data['pengumuman'] = Pengumuman::all();
        $data['slider'] = Slider::get()->first();
        return view('pages.home.index', $data);
    }
    public function register(Request $request)
    {
        $angkaAcak = rand(00000000, 99999999);

        if ($request->jenis == 'Siswa Baru') {
            $kode = 'SB';
        } else {
            $kode = 'PH';
        }

        $no_pendaftaran = $kode . '' . $angkaAcak;

        $daftar = CalonSiswa::create([
            'no_pendaftaran' => $no_pendaftaran,
            'tanggal' => date('Y-m-d'),
            'jenis' => $request->jenis,
            'username' => $request->username,
            'nama' => $request->nama,
            'no_telp' => $request->no_telp,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'password' => Hash::make($request->password),
        ]);

        if ($daftar) {
            $data = [
                'username' => $request->username,
                'password' => $request->password
            ];

            if (Auth::guard('siswa')->attempt($data)) {
                return redirect()->route('siswaHome');
            } else {
                return redirect()->route('home');
            }
        }
    }
}
