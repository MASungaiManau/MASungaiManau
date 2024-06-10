<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    public function index()
    {
        $data['pengguna'] = User::all();
        return view('pages.admin.data-pengguna', $data);
    }
    public function add(Request $request)
    {
        $foto = $request->file('foto');
        if($foto){
            $fotoName = uniqid() .'.'. $foto->getClientOriginalExtension();
            $foto->move('img', $fotoName);

            User::create([
                'nama' => $request->nama,
                'email' => $request->email,
                'username' => $request->username,
                'no_telp' => $request->no_telp,
                'password' => Hash::make($request->password),
                'level' => $request->level,
                'foto' => $fotoName
            ]);
        }else{
            User::create([
                'nama' => $request->nama,
                'email' => $request->email,
                'username' => $request->username,
                'no_telp' => $request->no_telp,
                'password' => Hash::make($request->password),
                'level' => $request->level,
            ]);
        }
        return redirect()->back();
    }
    public function update(Request $request, $id)
    {
        $pass = $request->password;
        $foto = $request->file('foto');

        $data = User::find($id);

        if($foto){
            File::delete(public_path('img/'. $data->foto));

            $fotoName = uniqid() .'.'. $foto->getClientOriginalExtension();
            $foto->move('img', $fotoName);

            if ($pass) {
                User::find($id)->update([
                    'nama' => $request->nama,
                    'email' => $request->email,
                    'username' => $request->username,
                    'no_telp' => $request->no_telp,
                    'password' => Hash::make($pass),
                    'level' => $request->level,
                    'foto' => $fotoName
                ]);
            } else {
                User::find($id)->update([
                    'nama' => $request->nama,
                    'email' => $request->email,
                    'username' => $request->username,
                    'no_telp' => $request->no_telp,
                    'level' => $request->level,
                    'foto' => $fotoName
                ]);
            }
        }else{
            if ($pass) {
                User::find($id)->update([
                    'nama' => $request->nama,
                    'email' => $request->email,
                    'username' => $request->username,
                    'no_telp' => $request->no_telp,
                    'password' => Hash::make($pass),
                    'level' => $request->level,
                ]);
            } else {
                User::find($id)->update([
                    'nama' => $request->nama,
                    'email' => $request->email,
                    'username' => $request->username,
                    'no_telp' => $request->no_telp,
                    'level' => $request->level,
                ]);
            }
        }
        return redirect()->back();
    }
    public function delete($id)
    {
        $data = User::find($id);
        File::delete(public_path('img/' . $data->foto));
        User::find($id)->delete();
        return redirect()->back();
    }
}
