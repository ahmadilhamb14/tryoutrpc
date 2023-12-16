@extends('dashboard.layouts.main')

@section('container')
<div class="users">
@can('admin')
<div>
    <div>
      <div>
        <center>
        <p>Hasil Tryout {{$tryout}}</p>
        {{ $user->fullname }} <br>
        {{ $tanggal }}
        <br><br>
    </center>
      </div>
      <div class="text-center mx-3">
        <table class="table">
          <thead>
            <tr class="text-center">
              <th scope="col" style="background: #FFC107;">No</th>
              <th scope="col" style="background: #FFC107;">Subtes</th>
              <th scope="col" style="background: #FFC107;">Skor</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($scores as $score)
            <tr class="text-center">
              <td scope="row">{{ $loop->iteration }}</td>
              <td>{{$score->subtest->subtes}}</td>
              <td>{{ $score->score }}</td>
            </tr>
            @endforeach
          </tbody>
        </table> 
      </div>
      </div>
    </div>
  </div>
@endcan
@can('non-admin')
  <div>
    <div>
      <div>
        <center>
        <p>Hasil Tryout {{$tryout}}</p>
        {{ $user1->fullname }} <br>
        {{ $tanggal }}
        <br><br>
    </center>
      </div>
      <div class="text-center mx-3">
        <table class="table">
          <thead>
            <tr class="text-center">
              <th scope="col" style="background: #FFC107;">No</th>
              <th scope="col" style="background: #FFC107;">Subtes</th>
              <th scope="col" style="background: #FFC107;">Skor</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($scores1 as $score)
            <tr class="text-center">
              <td scope="row">{{ $loop->iteration }}</td>
              <td>{{$score->subtest->subtes}}</td>
              <td>{{ $score->score }}</td>
            </tr>
            @endforeach
          </tbody>
        </table> 
      </div>
      </div>
    </div>
  </div>
@endcan
@endsection
