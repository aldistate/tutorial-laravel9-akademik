<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = Siswa::orderby('nomor_induk', 'asc')->paginate(5);
        return view('siswa.index', [
            'siswa' => $siswa
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('nomor_induk', $request->nomor_induk);
        Session::flash('nama', $request->nama);
        Session::flash('alamat', $request->alamat);

        $request->validate([
            'nomor_induk' => 'required|numeric',
            'nama' => 'required',
            'alamat' => 'required'
        ],[
            'nomor_induk.required' => 'Nomor induk wajib diisi',
            'nama.required' => 'Nama wajib diisi',
            'alamat.required' => 'Alamat wajib diisi',
        ]);

        $data = [
            'nomor_induk' => $request->input('nomor_induk'),
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
        ];

        Siswa::create($data);

        return redirect('/siswa')->with('sukses', 'Data berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siswa = Siswa::where('nomor_induk', $id)->first();
        return view('siswa.show', [
            'siswa' => $siswa
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $siswa = Siswa::where('nomor_induk', $id)->first();

        return view('siswa.edit', [
            'siswa' => $siswa
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required'
        ],[
            'nama.required' => 'Nama wajib diisi',
            'alamat.required' => 'Alamat wajib diisi',
        ]);

        $data = [
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
        ];

        Siswa::where('nomor_induk', $id)->update($data);

        return redirect('/siswa')->with('sukses', 'Data berhasil Diubah!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Siswa::where('nomor_induk', $id)->delete();
        return redirect('/siswa')->with('sukses', 'Data berhasil Dihapus!!');
    }
}
