@extends('dashboard.layouts.main')
@section('container')
    <div class="profile">
        <div class="d-flex justify-content-end">
            <button onclick="goBack()" class="btn btn-secondary text-light">Kembali</button>
        </div>
        <div class="top">
            <div class="text" style="background-color: #FFC107;">
                <h4>Profile</h4>
            </div>
            <div class="picture">
                <i class="fa-regular fa-circle-user"></i>
            </div>
        </div>
        <div class="konten">
            <form action="/profile/edit/{{ $profile->id }}" method="POST">
                @method('put')
                @csrf
                <h1>{{ auth()->user()->fullname }}</h1>
                <div class="row justify-content-center my-3">
                    <div class="px-5">
                        <div class="mb-2">
                            <p class="m-0">Nama Lengkap</p>
                            <input class="@error('fullname') is-invalid @enderror rounded" type="text" name="fullname"
                                value="{{ old('fullname', $profile->fullname) }}">
                            @error('fullname')
                                <div class="mt-1 invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <p class="m-0">Asal Sekolah</p>
                            <input class="@error('school') is-invalid @enderror rounded" type="text" name="school"
                                value="{{ old('school', $profile->sekolah->sekolah) }}">
                            @error('school')
                                <div class="mt-1 invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <p class="m-0">Username</p>
                            <input class="@error('username') is-invalid @enderror rounded" type="text" name="username"
                                value="{{ old('username', $profile->username) }}">
                            @error('username')
                                <div class="mt-1 invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <p class="m-0">Password</p>
                            <input class="@error('password') is-invalid @enderror rounded" type="password" name="password">
                            @error('password')
                                <div class="mt-1 invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                </div>

                <button type="submit" class="btn btn-primary mx-5 my-3 px-3">Simpan</button>
            </form>
        </div>
    </div>
@endsection
