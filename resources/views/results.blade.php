@extends('dashboard.layouts.main')

@section('container')
<div class="users">
<h4 class="mb-2">Hasil Tryout</h4>
<table class="table">
  <thead>
    <tr class="text-center">
      <th scope="col" style="background: #FFC107;">No</th>
      <th scope="col" style="background: #FFC107;">Nama</th>
      <th scope="col" style="background: #FFC107;">Jenis Tryout</th>
      <th scope="col" style="background: #FFC107;">Skor</th>
    </tr>
  </thead>
  <tbody>
    <tr class="text-center">
      <th scope="row">1</th>
      <td>Syifa</td>
      <td>UTBK-SNBT</td>
      <td>700 <a class="badge bg-success" href=""><span
              data-feather="eye"></span></a>
    </tr>
    <tr class="text-center">
      <th scope="row">2</th>
      <td>Aisyah</td>
      <td>SKD-CAT</td>
      <td>800 <a class="badge bg-success" href=""><span
              data-feather="eye"></span></a>
    </tr>
  </tbody>
</table> 
</div>
@endsection
