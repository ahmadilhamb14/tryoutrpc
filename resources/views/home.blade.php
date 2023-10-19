<!-- Mengambil Layout utama -->
@extends('dashboard.layouts.main')

<!-- Berisi hal-hal berbeda dari setiap halaman yang akan di tampilkan di layout utama -->
@section('container')
<div class="greeting">
     <h1> Halo! [Nama Pengguna]</h1>
</div>
@endsection

<!-- extends section include yield disebut directive blade -->