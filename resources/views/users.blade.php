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
  @foreach ($users as $user)
  <?php $no = 0 ?>
    <tr class="text-center">
      <td>{{ $loop->iteration }}</td>
      <td>{{$user['fullname']}}</td>
      <td>{{$user['school']}}</td>
      <td>{{$user['username']}}</td>
      <td> ******* </td> 
      <td>
          <a class="badge bg-warning" href="/user/{{ $user->id }}/edit" data-bs-toggle="modal" data-bs-target="#edit-user"><span
              data-feather="edit"></span></a>
          <form action="" method="POST" class="d-inline">
              <button class="badge bg-danger border-0"
                  onclick="return confirm('Apakah kamu yakin ingin menghapus data?')"><span
                    data-feather="trash-2"></span></button></td>
    </tr>
  @endforeach
  </tbody>
</table> 
<a type="button" class="btn btn-primary" href="" data-bs-toggle="modal" data-bs-target="#add-user">Tambah User</a>
</div>
<!-- Modal Show User -->
<div class="modal fade" id="show-user" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">User</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="row justify-content-center my-3">
        <div class="col-4 mb-2">
          Nama Lengkap
        </div>
        <div class="col-5 mb-2" id="fullname">
          : {{$user['fullname']}}
        </div>
        <div class="col-4 mb-2">
          Asal Sekolah
        </div>
        <div class="col-5 mb-2" id="school">
          : {{$user['school']}}
        </div>
        <div class="col-4 mb-2">
          Username
        </div>
        <div class="col-5 mb-2 " id="username">
          : {{$user['username']}}
        </div>
        <div class="col-4 mb-2">
          Password
        </div>
        <div class="col-5 mb-2">
          : *******
        </div>
      </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal add User -->
<div class="modal fade" id="add-user" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah User</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="row justify-content-center my-3">
        <div class="col-4 mb-2">
          <label for="nama">Nama Lengkap</label>
        </div>
        <div class="col-6 mb-2">
          <input type="text" name="nama" id="" class="rounded">
        </div>
        <div class="col-4 mb-2">
          <label for="sekolah">Asal Sekolah</label>
        </div>
        <div class="col-6 mb-2">
          <input type="text" name="sekolah" id="" class="rounded">
        </div>
        <div class="col-4 mb-2">
          <label for="username">Username</label>
        </div>
        <div class="col-6 mb-2">
          <input type="text" name="username" id="" class="rounded">
        </div>
        <div class="col-4 mb-2">
          <label for="pass">Password</label>
        </div>
        <div class="col-6 mb-2">
          <input type="password" name="pass" id="" class="rounded">
        </div>
      </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal edit User -->
<div class="modal fade" id="edit-user" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit User</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="row justify-content-center my-3">
        <div class="col-4 mb-2">
          <label for="nama">Nama Lengkap</label>
        </div>
        <div class="col-6 mb-2">
          <input type="text" name="nama" id="" class="rounded" value="Syifa">
        </div>
        <div class="col-4 mb-2">
          <label for="sekolah">Asal Sekolah</label>
        </div>
        <div class="col-6 mb-2">
          <input type="text" name="sekolah" id="" class="rounded" value="SMA XX">
        </div>
        <div class="col-4 mb-2">
          <label for="username">Username</label>
        </div>
        <div class="col-6 mb-2">
          <input type="text" name="username" id="" class="rounded" value="Sy1f4">
        </div>
        <div class="col-4 mb-2">
          <label for="pass">Password</label>
        </div>
        <div class="col-6 mb-2">
          <input type="password" name="pass" id="" class="rounded" value="******">
        </div>
      </div>
      </div>
    </div>
  </div>
</div>
@endsection
