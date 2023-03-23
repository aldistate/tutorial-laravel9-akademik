@extends('layout.main')

@section('container')
  <a class="btn btn-success mb-3" href="{{ url('/siswa/create') }}">Tambahkan Data Siswa</a>
  <table class="table">
    <thead>
      <tr>
        <th>Nomor Induk</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($siswa as $s)
        <tr>
          <td>{{ $s->nomor_induk }}</td>
          <td>{{ $s->nama }}</td>
          <td>{{ $s->alamat }}</td>
          <td><a class="btn btn-secondary btn-sm" href="{{ url('/siswa/'.$s->nomor_induk) }}">Detail</a></td>
        </tr>
      @endforeach
    </tbody>
  </table>
  {{ $siswa->links() }}
@endsection