<!-- Mengambil Layout utama -->
@extends('dashboard.layouts.main')

<!-- Berisi hal-hal berbeda dari setiap halaman yang akan di tampilkan di layout utama -->
@section('container')
<div class="greeting">
     @can('admin')
     <h1>Hai Admin,
          <br><br>
          Selamat Datang di Tryout RPC (Ranu Prima Collage)
     </h1>
     @endcan
     @can('non-admin')
     <h1>Hai {{ auth()->user()->fullname }},
     <br><br>
     Selamat Datang di Tryout RPC (Ranu Prima Collage)
     </h1>
     @endcan



</div>
@endsection
<!-- extends section include yield disebut directive blade -->