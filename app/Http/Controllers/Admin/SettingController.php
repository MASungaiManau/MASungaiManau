<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    public function index()
    {
        $data['data'] = Setting::get()->first();
        return view('pages.admin.setting', $data);
    }
    public function updateNamaSekolah(Request $request, $id)
    {
        Setting::find($id)->update([
            'nama_sekolah' => $request->nama_sekolah
        ]);
        return redirect()->back();
    }
    public function updateLogo(Request $request, $id)
    {
        $data = Setting::find($id);
        File::delete(public_path('img/logo/' . $data->logo));

        $logo = $request->file('logo');
        $logoName = 'Logo_' . uniqid() . '.' . $logo->getClientOriginalExtension();
        $logo->move('img/logo', $logoName);

        Setting::find($id)->update([
            'logo' => $logoName
        ]);
        return redirect()->back();
    }
    public function updateFormulir(Request $request, $id)
    {
        $data = Setting::find($id);
        File::delete(public_path('berkas/formulir/' . $data->formulir));

        $formulir = $request->file('formulir');
        $formulirName = 'Formulir_' . uniqid() . '.' . $formulir->getClientOriginalExtension();
        $formulir->move('berkas/formulir', $formulirName);

        Setting::find($id)->update([
            'formulir' => $formulirName
        ]);
        return redirect()->back();
    }

    // Ajax
    public function updateStatus(Request $request)
    {
        Setting::find($request->id)->update([
            'status_pendaftaran' => $request->status
        ]);

        $pesan = 'Pendaftaran ' . $request->status;

        return response()->json($pesan);
    }
}
