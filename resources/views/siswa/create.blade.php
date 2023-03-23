@extends('layout.main')

@section('container')
  <h1 class="mb-5">Tambahkan Data Siswa</h1>
  <form action="{{ url('/siswa') }}" method="post">
    @csrf
    <div class="mb-3">
      <label for="nomor_induk" class="form-label">Nomor Induk : </label>
      <input type="number" class="form-control" name="nomor_induk" id="nomor_induk" value="{{ Session::get('nomor_induk') }}">
    </div>
    <div class="mb-3">
      <label for="nama" class="form-label">Nama : </label>
      <input type="text" class="form-control" name="nama" id="nama" value="{{ Session::get('nama') }}">
    </div>
    <div class="mb-3">
      <label for="alamat" class="form-label">Alamat : </label>
      <input type="text" class="form-control" name="alamat" id="alamat" value="{{ Session::get('alamat') }}">
    </div>
    <button type="submit" class="btn btn-success">Tambah</button>
  </form>
@endsection