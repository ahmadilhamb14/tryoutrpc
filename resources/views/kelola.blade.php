@extends('dashboard.layouts.main')

@section('container')
<div class="users">
    <h4 class="mt-4">UTBK-SNBT</h4>
    <button class=" mb-3 px-2" style="border-radius: 10px; border: none; background-color: rgb(61, 84, 214); color: rgb(255, 255, 255); font-weight: bold;" >
        Tambah Soal
    </button>
    <table class="table">
        <thead>
            <tr class="text-center">
                <th scope="col" style="background: #FFC107;">No</th>
                <th scope="col" style="background: #FFC107;">Soal</th>
                <th scope="col" style="background: #FFC107;">Subtes</th>
                <th scope="col" style="background: #FFC107;">Gambar</th>
            </tr>
        </thead>
        <tbody>
            <tr class="text-center">
                <th scope="row">1</th>
                <td>...</td>
                <td>penalaran matematika</td>
                <td>foto.jpg</td>
            </tr>
        </tbody>
    </table> 
</div>
@endsection