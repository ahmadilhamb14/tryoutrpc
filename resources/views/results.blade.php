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
      <td>SKD-CAT</td>
      <td>450 <a class="badge bg-success" href="" data-bs-toggle="modal" data-bs-target="#detail-hasil"><span
              data-feather="eye"></span></a>
    </tr>
    <tr class="text-center">
      <th scope="row">2</th>
      <td>Aisyah</td>
      <td>UTKB-SNBT</td>
      <td>435 <a class="badge bg-success" href=""><span
              data-feather="eye"></span></a>
    </tr>
  </tbody>
</table> 
</div>

<!-- Modal Detail hasil tryout -->
<div class="modal fade" id="detail-hasil" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Hasil Tryout</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center mx-3">
        <p>Hasil Tryout SKD-CAT <br>
          Syifa <br>
          20 Oktober 2023
        </p>
        <table class="table">
          <thead>
            <tr class="text-center">
              <th scope="col" style="background: #FFC107;">No</th>
              <th scope="col" style="background: #FFC107;">Subtes</th>
              <th scope="col" style="background: #FFC107;">Skor</th>
            </tr>
          </thead>
          <tbody>
            <tr class="text-center">
              <th scope="row">1</th>
              <td>Tes Wawasan Kebangsaan</td>
              <td>100/150</td>
            </tr>
            <tr class="text-center">
              <th scope="row">2</th>
              <td>Tes Intelegensia Umum</td>
              <td>150/175</td>
            </tr>
            <tr class="text-center">
              <th scope="row">3</th>
              <td>Tes Karakteristik Pribadi</td>
              <td>200/225</td>
            </tr>
          </tbody>
        </table> 
      </div>
      </div>
    </div>
  </div>
</div>
@endsection
