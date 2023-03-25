@extends('layout.main')

@section('container')
  <a href="/siswa" class="btn btn-secondary mb-3"> << Kembali</a>
  <h1 class="mb-5">Edit Data Siswa</h1>
  <form action="{{ url('/siswa/'.$siswa->nomor_induk) }}" method="post">
    @method('patch')
    @csrf
    <div class="mb-3">
      <label for="nomor_induk" class="form-label">Nomor Induk : </label>
      <input type="number" class="form-control" name="nomor_induk" id="nomor_induk" value="{{ $siswa->nomor_induk }}" disabled>
    </div>
    <div class="mb-3">
      <label for="nama" class="form-label">Nama : </label>
      <input type="text" class="form-control" name="nama" id="nama" value="{{ $siswa->nama }}">
    </div>
    <div class="mb-3">
      <label for="alamat" class="form-label">Alamat : </label>
      <textarea class="form-control" name="alamat" id="alamat">{{ $siswa->alamat }}</textarea>
    </div>
    <button type="submit" class="btn btn-success">Edit</button>
  </form>
@endsection