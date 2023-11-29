@extends('dashboard.layouts.main')

@section('container')
<div class="users">
<h4 class="mb-2">Hasil Tryout</h4>
<table class="table">
  <thead>
    <tr class="text-center">
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Jenis Tryout</th>
      <th scope="col">Skor</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($rawResults as $item)
    <tr class="text-center">
      <td scope="row">{{ $loop->iteration }}</td>
      <td>{{$item["fullname"] }}</td>
      <td>{{$item["tryout"]}}</td>
      <td>{{$item["total_score"]}}<a class="badge bg-success" href="" data-bs-toggle="modal" data-bs-target="#detail-hasil"><span
              data-feather="eye"></span></a>
    </tr>
    @endforeach
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
        @foreach ($scores as $score)
        <p>{{$score->subtest->tryout->tryout}} <br>
        {{$score->user->fullname }} <br>
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
              <td scope="row">1</th>
              <td>Tes Wawasan Kebangsaan</td>
              <td>{{ $score->score }}</td>
            </tr>
            <tr class="text-center">
              <td scope="row">2</th>
              <td>Tes Intelegensia Umum</td>
              <td>{{ $score->score }}</td>
            </tr>
            <tr class="text-center">
              <td scope="row">3</th>
              <td>Tes Karakteristik Pribadi</td>
              <td>{{ $score->score }}</td>
            </tr>
          </tbody>
        </table> 
        @endforeach
      </div>
      </div>
    </div>
  </div>
</div>
@endsection
