<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

    function indexRegis() {
        return view('register.index');
    }

    function storeRegis(Request $request) {
        Session::flash('name', $request->name);
        Session::flash('email', $request->email);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ], [
            'name.required' => 'Silahkan isi Nama terlebih dahulu',
            'email.required' => 'Silahkan isi E-Mail terlebih dahulu',
            'email.email' => 'Masukan E-Mail yang Valid',
            'email.unique' => 'E-Mail yang sudah dimasukan, sudah pernah digunakan',
            'password.required' => 'Silahkan isi Password terlebih dahulu',
            'password.min' => 'Masukan password dengan minimal 6 karakter',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];

        User::create($data);

        $login = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($login)) {
            return redirect('/siswa')->with('sukses', Auth::user()->name . ' Berhasil Login');
        } else {
            return redirect('/login')->withErrors('Username dan Password tidak valid');
        }
    }
}
