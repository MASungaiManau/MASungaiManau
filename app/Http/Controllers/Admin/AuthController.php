<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('pages.admin.login');
    }
    public function postLogin(Request $request)
    {
        $data = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if (Auth::attempt($data)) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('login');
        }
    }
    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
        }
        return redirect()->route('login');
    }
}
