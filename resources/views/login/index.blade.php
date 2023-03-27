@extends('layout.main')

@section('container')
  <div class="w-50 justify-center border rounded p-3 mx-auto">
    <h1 class="text-center mb-4">Login</h1>
    <form action="{{ route('login') }}" method="POST">
      @csrf
      <div class="mb-3">
        <label for="email" class="form-label">Email :</label>
        <input type="email" class="form-control" name="email" id="email" value="{{ Session::get('email') }}">
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" id="password">
      </div>
      <div class="mb-3 d-grid col-5 mx-auto">
        <button name="submit" type="submit" class="btn btn-primary">Login</button>
      </div>
    </form>
  </div>
@endsection