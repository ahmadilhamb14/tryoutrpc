@extends('dashboard.layouts.main')

@section('container')
<div class="users">
    <h4 class="mb-2 mt-4">UTBK-SNBT</h4>
    <h5 class = "mb-3" style="text-align: center;">Rincian Subtes</h5>
    <table class="table">
        <thead>
            <tr class="text-center">
                <th scope="col" >No</th>
                <th scope="col" >Subtes</th>
                <th scope="col" >Waktu Pengerjaan</th>
                <th scope="col" >Jumlah Soal</th>
            </tr>
        </thead>
        <tbody>
            <tr class="text-center">
                <td scope="row">1</td>
                <td>Penalaran Matematika</td>
                <td>20 Menit</td>
                <td>30</td>
            </tr>
        </tbody>
    </table> 
    <a href="test" type="submit" class="btn btn-warning px-3 mt-4" >
        START
     </a>
</div>
@endsection