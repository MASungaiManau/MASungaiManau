<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengumumanController extends Controller
{
    public function index(){
        $data['pengumuman'] = Pengumuman::all();
        return view('pages.admin.pengumuman', $data);
    }
    public function add(Request $request){
        Pengumuman::create([
            'user_id' => Auth::user()->id,
            'tanggal' => $request->tanggal,
            'judul' => $request->judul,
            'pengumuman' => $request->pengumuman,
            'status' => 'Aktif'
        ]);
        return redirect()->back();
    }
    public function update(Request $request, $id){
        Pengumuman::find($id)->update([
            'tanggal' => $request->tanggal,
            'judul' => $request->judul,
            'pengumuman' => $request->pengumuman,
        ]);
        return redirect()->back();
    }
    public function delete($id){
        Pengumuman::find($id)->delete();
        return redirect()->back();
    }

    // Ajax
    public function updateStatus(Request $request){
        Pengumuman::find($request->id)->update([
            'status' => $request->status
        ]);

        return response()->json('Success');
    }
}
