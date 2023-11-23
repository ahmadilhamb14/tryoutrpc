@extends('dashboard.layouts.main')
@section('container')
<div>
<h3>Edit User</h3>
    <br>

    <form action="/users/{{ $user->id }}" method="POST" id="form">
        @method('put')
        @csrf
        <div class="row justify-content-center my-3">
          <div class="col-4 mb-2">
            <label for="nama">Nama Lengkap</label>
          </div>
          <div class="col-6 mb-2">
            <input type="text" name="fullname" id="nama" class="rounded" value="{{ old('fullname', $user->fullname) }}">
          </div>
          <div class="col-4 mb-2">
            <label for="sekolah">Asal Sekolah</label>
          </div>
          <div class="col-6 mb-2">
            <input type="text" name="school" id="sekolah" class="rounded" value="{{ old('school', $user->school) }}">
          </div>
          <div class="col-4 mb-2">
            <label for="username">Username</label>
          </div>
          <div class="col-6 mb-2">
            <input type="text" name="username" id="username-input" class="rounded" value="{{ old('username', $user->username) }}">
          </div>
          <center>
          <button type="submit" class="btn btn-primary text-align-center mt-4">Simpan</button>
          </center>
        </div>
        </form>
    </div>

@endsection