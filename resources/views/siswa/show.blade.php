@extends('layout.main')

@section('container')
  <div>
    <a class="btn btn-secondary" href="{{ url('siswa/') }}">Kembali</a>
    <h1>Nama : {{ $siswa->nama }}</h1>
    <p>Nomor Induk : {{ $siswa->nomor_induk }}</p>
    <p>Alamat : {{ $siswa->alamat }}</p>
    <p>Created At : {{ $siswa->created_at }}</p>
  </div>
@endsection