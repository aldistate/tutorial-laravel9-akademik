@extends('layout.main')

@section('container')
  <a class="btn btn-success mb-3" href="{{ url('/siswa/create') }}">Tambahkan Data Siswa</a>
  <table class="table">
    <thead>
      <tr>
        <th>Foto</th>
        <th>Nomor Induk</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th class="text-center">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($siswa as $s)
        <tr>
          <td>
            @if ($s->foto)
              <img style="max-width:50px;max-height:50px;" src="{{ url('foto') . "/" . $s->foto }}" alt="{{ $s->foto }}">
            @endif
          </td>
          <td>{{ $s->nomor_induk }}</td>
          <td>{{ $s->nama }}</td>
          <td>{{ $s->alamat }}</td>
          <td class="text-center">
            <a class="btn btn-secondary btn-sm" href="{{ url('/siswa/'.$s->nomor_induk) }}">Detail</a>
            <a class="btn btn-warning btn-sm" href="{{ url('/siswa/'.$s->nomor_induk.'/edit') }}">Edit</a>
            <form action="/siswa/{{ $s->nomor_induk }}" method="post" class="d-inline">
              @method('delete')
              @csrf
              <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapusnya?')">Delete</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  {{ $siswa->links() }}
@endsection