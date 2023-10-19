@extends('dashboard.layouts.main')

@section('container')
<div class="users">
<h4 class="mb-2">Users</h4>
<table class="table">
  <thead>
    <tr class="text-center">
      <th scope="col" style="background: #FFC107;">No</th>
      <th scope="col" style="background: #FFC107;">Nama</th>
      <th scope="col" style="background: #FFC107;">Asal Sekolah</th>
      <th scope="col" style="background: #FFC107;">Username</th>
      <th scope="col" style="background: #FFC107;">Password</th>
      <th scope="col" style="background: #FFC107;">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr class="text-center">
      <th scope="row">1</th>
      <td>Syifa</td>
      <td>SMA XX</td>
      <td>Sy1f4</td>
      <td>********</td>
      <td><a class="badge bg-success" href=""><span
              data-feather="eye"></span></a>
          <a class="badge bg-warning" href=""><span
              data-feather="edit"></span></a>
          <form action="" method="POST" class="d-inline">
              <button class="badge bg-danger border-0"
                  onclick="return confirm('Apakah kamu yakin ingin menghapus data?')"><span
                    data-feather="trash-2"></span></button></td>
    </tr>
  </tbody>
</table> 
<button class="btn btn-primary">Tambah User</button>
</div>
@endsection
