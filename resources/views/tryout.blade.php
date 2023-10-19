<!-- Mengambil Layout utama -->
@extends('dashboard.layouts.main')

@section('container')
<div class="tryout">
    <h4 class="mb-3">Silahkan pilih jenis tryout</h4>
        <div class="row">
          <div class="card" style="width: 14rem">
            <div class="start-50 p-3">
              <h3 class="mb-4">UTBK-SNBT</h3>
              <img class="mb-4" src="assets/img/snbt-logo.png" alt="" />
            </div>
            <button class="bg-warning p-1">KELOLA</button>
          </div>
          <div class="card" style="width: 14rem">
            <div class="start-50 p-3">
              <h3 class="mb-4">SKD-CAT</h3>
              <img class="mb-4" src="assets/img/cat-logo1.png" alt="" style="width: 7.35rem"/>
            </div>
            <button class="bg-warning p-1">KELOLA</button>
          </div>
        </div>
</div>
@endsection