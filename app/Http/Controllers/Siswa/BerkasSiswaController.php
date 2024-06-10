<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\BerkasSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class BerkasSiswaController extends Controller
{
    public function index()
    {
        $data['berkas'] = BerkasSiswa::where('siswa_id', Auth::user()->id)->get()->first();
        return view('pages.siswa.berkas', $data);
    }
    public function updateSkl(Request $request, $id)
    {
        $data = BerkasSiswa::find($id);

        $skl = $request->file('skl');
        if ($skl->getClientOriginalExtension() == 'pdf') {
            File::delete(public_path('berkas/' . $data->skl));

            $sklName = 'skl_' . Auth::user()->nama . '_' . uniqid() . '.' . $skl->getClientOriginalExtension();
            $skl->move('berkas', $sklName);

            BerkasSiswa::find($id)->update([
                'skl' => $sklName
            ]);

            return redirect()->back()->with('success', 'Data berhasil disimpan!');
        } else {
            return redirect()->back()->with('error', 'Format Data Salah!');
        }
    }
    public function updateIjazahSd(Request $request, $id)
    {
        $data = BerkasSiswa::find($id);

        $ijazahSd = $request->file('ijazah_sd');
        if ($ijazahSd->getClientOriginalExtension() == 'pdf') {
            File::delete(public_path('berkas/' . $data->ijazah_sd));

            $ijazahSdName = 'ijazahSd_' . Auth::user()->nama . '_' . uniqid() . '.' . $ijazahSd->getClientOriginalExtension();
            $ijazahSd->move('berkas', $ijazahSdName);

            BerkasSiswa::find($id)->update([
                'ijazah_sd' => $ijazahSdName
            ]);

            return redirect()->back()->with('success', 'Data berhasil disimpan!');
        } else {
            return redirect()->back()->with('error', 'Format Data Salah!');
        }
    
    }
    public function updateKk(Request $request, $id)
    {
        $data = BerkasSiswa::find($id);

        $kk = $request->file('kk');
        if ($kk->getClientOriginalExtension() == 'pdf') {
            File::delete(public_path('berkas/' . $data->kk));

            $kkName = 'KK_' . Auth::user()->nama . '_' . uniqid() . '.' . $kk->getClientOriginalExtension();
            $kk->move('berkas', $kkName);

            BerkasSiswa::find($id)->update([
                'kk' => $kkName
            ]);

            return redirect()->back()->with('success', 'Data berhasil disimpan!');
        } else {
            return redirect()->back()->with('error', 'Format Data Salah!');
        }
    }
    public function updateAkta(Request $request, $id)
    {
        $data = BerkasSiswa::find($id);

        $akta = $request->file('akta');
        if ($akta->getClientOriginalExtension() == 'pdf') {
            File::delete(public_path('berkas/' . $data->akte));

            $aktaName = 'Akta_' . Auth::user()->nama . '_' . uniqid() . '.' . $akta->getClientOriginalExtension();
            $akta->move('berkas', $aktaName);

            BerkasSiswa::find($id)->update([
                'akte' => $aktaName
            ]);

            return redirect()->back()->with('success', 'Data berhasil disimpan!');
        } else {
            return redirect()->back()->with('error', 'Format Data Salah!');
        }
    }
    public function updatePasfoto(Request $request, $id)
    {
        $data = BerkasSiswa::find($id);

        $pasfoto = $request->file('pasfoto');
        if ($pasfoto->getClientOriginalExtension() == 'jpg') {
            File::delete(public_path('berkas/' . $data->pasfoto));

            $pasfotoName = 'pasfoto_' . Auth::user()->nama . '_' . uniqid() . '.' . $pasfoto->getClientOriginalExtension();
            $pasfoto->move('berkas', $pasfotoName);

            BerkasSiswa::find($id)->update([
                'pasfoto' => $pasfotoName
            ]);

            return redirect()->back()->with('success', 'Data berhasil disimpan!');
        } else {
            return redirect()->back()->with('error', 'Format Data Salah!');
        }
    }
    public function updateLainnya(Request $request, $id)
    {
        $data = BerkasSiswa::find($id);

        $lainnya = $request->file('lainnya');
        if ($lainnya->getClientOriginalExtension() == 'pdf') {
            File::delete(public_path('berkas/' . $data->lainnya));

            $lainnyaName = 'Lainnya' . Auth::user()->nama . '_' . uniqid() . '.' . $lainnya->getClientOriginalExtension();
            $lainnya->move('berkas', $lainnyaName);

            BerkasSiswa::find($id)->update([
                'lainnya' => $lainnyaName
            ]);

            return redirect()->back()->with('success', 'Data berhasil disimpan!');
        } else {
            return redirect()->back()->with('error', 'Format Data Salah!');
        }
    }
}
