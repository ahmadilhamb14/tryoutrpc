<!-- Mengambil Layout utama -->
@extends('dashboard.layouts.main')

@section('container')
<div class="tryout">
    {{-- <h4 class="mb-2">Test Tryout</h4> --}}
    <div class="row justify-content-between mb-3">
      <div class="col-4">
        <h4>Test Tryout</h4> 
      </div>
      <div class="col-4 d-flex justify-content-end">
        <button class="btn btn-secondary text-light">Kembali</button>
      </div>
    </div>
        <div class="row">
          @foreach ($tryouts as $tryout)
          <div class="card p-0" style="width: 14rem">
            <div class="start-50 p-3">
              <h3 class="mb-4">{{$tryout['tryout']}}</h3>
              <img class="mb-3" src="assets/img/{{$tryout['tryout']}}-logo.png" alt="" height="132px"/>
            </div>
            @can('admin')
            <a href="tryout/{{ $tryout->id }}" type="button" class="btn btn-warning p-1">KELOLA</a>
            @endcan
            @can('non-admin')
            <a href="tryout/{{ $tryout->id }}" type="button" class="btn btn-warning p-1">Review</a>
            @endcan
          </div>
          @endforeach
        </div>
</div>
@endsection