<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function postlogin(Request $request)
    {
        $data = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if (Auth::guard('siswa')->attempt($data)) {
            return redirect()->route('siswaHome');
        } else {
            return redirect()->route('home')->with('error', 'Username dan Password Salah!');
        }
    }
    public function logout()
    {
        if (Auth::guard('siswa')->check()) {
            Auth::guard('siswa')->logout();
        }
        return redirect()->route('home');
    }
}
