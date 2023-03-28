<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    function index() {
        return view('login.index');
    }

    function login(Request $request) {
        Session::flash('email', $request->email);
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Silahkan isi E-Mail terlebih dahulu',
            'password.required' => 'Silahkan isi Password terlebih dahulu'
        ]);

        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($data)) {
            return redirect('/siswa')->with('sukses', 'Berhasil Login');
        } else {
            return redirect('/login')->withErrors('Username dan Password tidak valid');
        }
        
    }

    function logout() {
        Auth::logout();

        return redirect('/login')->with('sukses', 'Berhasil Logout!!');
    }
}
