@extends('layout.main')

@section('container')
  <div class="w-50 p-3 border rounded text-center mx-auto">
    <h1 class="mb-3">Selamat Datang</h1>
    <h3 class="mb-5">Silahkan login atau register untuk masuk ke dalam aplikasi</h3>
    <a href="{{ route('indexLogin') }}" class="btn btn-primary btn-lg">Login</a>
    <a href="{{ route('indexRegis') }}" class="btn btn-success btn-lg">Register</a>
  </div>
@endsection