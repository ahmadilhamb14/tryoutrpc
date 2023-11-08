<!-- Mengambil Layout utama -->
@extends('dashboard.layouts.main')

<!-- Berisi hal-hal berbeda dari setiap halaman yang akan di tampilkan di layout utama -->
@section('container')
<div class="greeting">
     @can('admin')
     <h1>Selamat datang Admin</h1>
     @endcan
     @can('non-admin')
     <h1>Selamat datang {{ auth()->user()->fullname }}</h1>
     @endcan



</div>
@endsection
<!-- extends section include yield disebut directive blade -->