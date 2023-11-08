@extends('dashboard.layouts.main')

@section('container')
<div class="users">
    <h4 class="mb-2 mt-4">UTBK-SNBT</h4>
    <h5 class = "mb-3" style="text-align: center;">Rincian Subtes</h5>
    <table class="table">
        <thead>
            <tr class="text-center">
                <th scope="col" style="background: #FFC107; ">No</th>
                <th scope="col" style="background: #FFC107; ">Subtes</th>
                <th scope="col" style="background: #FFC107;">Waktu Pengerjaan</th>
                <th scope="col" style="background: #FFC107;">Jumlah Soal</th>
            </tr>
        </thead>
        <tbody>
            <tr class="text-center">
                <th scope="row">1</th>
                <td>Penalaran Matematika</td>
                <td>20 Menit</td>
                <td>30</td>
            </tr>
        </tbody>
    </table> 
    <button class="px-3 mt-4 " style= "border-radius: 10px; background-color: #FFC107; font-weight: bolder; border:none; " >
        START
     </button>
</div>
@endsection