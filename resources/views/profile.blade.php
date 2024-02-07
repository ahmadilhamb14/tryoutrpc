@extends('dashboard.layouts.main')
@section('container')
    <div class="users">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        {{-- <div class="profile"> --}}
        <div class="top">
            <div class="text" style="background-color: #FFC107;">
                <h4>Profile</h4>
            </div>
            <div class="picture">
                <i class="fa-regular fa-circle-user"></i>
            </div>
        </div>
        <div class="konten">
            <h1>{{ auth()->user()->fullname }}</h1>
            <div class="row justify-content-center my-3">
                <div class="col-4 mb-2">
                    Nama Lengkap
                </div>
                <div class="col-5 mb-2">
                    : {{ auth()->user()->fullname }}
                </div>
                <div class="col-4 mb-2">
                    Asal Sekolah
                </div>
                <div class="col-5 mb-2">
                    : {{ auth()->user()->sekolah->sekolah }}
                </div>
                <div class="col-4 mb-2">
                    Username
                </div>
                <div class="col-5 mb-2">
                    : {{ auth()->user()->username }}
                </div>
            </div>
            <a href="/profile/edit/{{ auth()->user()->id }}" type="button" class="btn btn-primary mx-5 my-3 px-3">Ubah
                Profile</a>
        </div>
        {{-- </div> --}}
    @endsection
