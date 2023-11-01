@extends('dashboard.layouts.main')
@section('container')

        <div class="profile">
            <div class="top">
                <div class="text" style="background-color: #FFC107;">
                    <h4>Profile</h4>
                </div>
                <div class="picture">
                    <i class="fa-regular fa-circle-user"></i>
                </div>
            </div>
            <div class="konten">
                <h1>[Nama Pengguna]</h1>
                    <div class="row justify-content-center my-3">
                        <div class="col-4 mb-2">
                        Nama Lengkap
                        </div>
                        <div class="col-5 mb-2">
                        : Syifa
                        </div>
                        <div class="col-4 mb-2">
                        Asal Sekolah
                        </div>
                        <div class="col-5 mb-2">
                        : SMA XX
                        </div>
                        <div class="col-4 mb-2">
                        Username
                        </div>
                        <div class="col-5 mb-2">
                        : Sy1f4
                        </div>
                        <div class="col-4 mb-2">
                        Password
                        </div>
                        <div class="col-5 mb-2">
                        : *********
                        </div>
                  </div>

                  <button type="button" class="button mx-5 my-3 px-3">Ubah Profile</button>
            </div>
        </div>
        
    </div>
    @endsection