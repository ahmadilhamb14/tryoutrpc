<!-- Mengambil Layout utama -->
@extends('dashboard.layouts.main')

@section('container')
<div class="tryout">
    <h4 class="mb-2">Test Tryout</h4>
        <div class="row">
          <div class="card p-0" style="width: 14rem">
            <div class="start-50 p-3">
              <h3 class="mb-4">UTBK-SNBT</h3>
              <img class="mb-4" src="assets/img/snbt-logo.png" alt="" />
            </div>
            @can('admin')
            <a href="/tryout/kelola" type="button" class="btn btn-warning p-1">KELOLA</a>
            @endcan
            @can('non-admin')
            <a href="/tryout/review" type="button" class="btn btn-warning p-1">Review</a>
            @endcan
          </div>
          <div class="card p-0" style="width: 14rem">
            <div class="start-50 p-3">
              <h3 class="mb-4">SKD-CAT</h3>
              <img class="mb-4" src="assets/img/cat-logo1.png" alt="" style="width: 7.35rem"/>
            </div>
            @can('admin')
            <a href="/tryout/kelola" type="button" class="btn btn-warning p-1">KELOLA</a>
            @endcan
            @can('non-admin')
            <a href="/tryout/review" type="button" class="btn btn-warning p-1">Review</a>
            @endcan
          </div>
        </div>
</div>
@endsection