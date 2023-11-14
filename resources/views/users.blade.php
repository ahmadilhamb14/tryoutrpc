@extends('dashboard.layouts.main')

@section('container')
<div class="users">
@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
{{ session('success') }}
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<h4 class="mb-2">Users</h4>
<table class="table">
  <thead>
    <tr class="text-center">
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Asal Sekolah</th>
      <th scope="col">Username</th>
      <th scope="col">Action</th>
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
      <td>
          <!-- <a class="badge bg-warning" href="/user/{{ $user->id }}/edit" data-bs-toggle="modal" data-bs-target="#edit-user"><span -->
          <button class="badge bg-warning" value="{{ $user->id }}" id="mediumbutton" data-bs-toggle="modal" data-bs-target="#edit-user"><span
              data-feather="edit"></span></button>
          <form action="/users/{{ $user->id }}" method="POST" class="d-inline">
          @method('delete')
            @csrf
              <button class="badge bg-danger border-0"
                  onclick="return confirm('Apakah kamu yakin ingin menghapus data?')"><span
                    data-feather="trash-2"></span></button>
          </form>
      </td>
    </tr>
  @endforeach
  </tbody>
</table> 
<a type="button" class="btn btn-primary" href="" data-bs-toggle="modal" data-bs-target="#add-user">Tambah User</a>
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
      <form action="/users" method="post">
        @csrf
      <div class="row justify-content-center my-3">
        
        <div class="col-4 mb-2">
          <label for="nama">Nama Lengkap</label>
        </div>
        <div class="col-6 mb-2">
          <input type="text" name="fullname" id="" class="rounded">
        </div>
        <div class="col-4 mb-2">
          <label for="sekolah">Asal Sekolah</label>
        </div>
        <div class="col-6 mb-2">
          <input type="text" name="school" id="" class="rounded">
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
          <input type="password" name="password" id="" class="rounded">
        </div>
        <center>
        <button type="submit" class="btn btn-primary text-align-center mt-4" href="">Simpan</button>
        </center>
      
      </div>
      </form>
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
      <form action="/users/{{ $user->id }}" method="post" id="form">
      @method('put')
      @csrf
      <div class="row justify-content-center my-3">
        <div class="col-4 mb-2">
          <label for="nama">Nama Lengkap</label>
        </div>
        <div class="col-6 mb-2">
          <input type="text" name="fullname" id="nama" class="rounded">
        </div>
        <div class="col-4 mb-2">
          <label for="sekolah">Asal Sekolah</label>
        </div>
        <div class="col-6 mb-2">
          <input type="text" name="school" id="sekolah" class="rounded" >
        </div>
        <div class="col-4 mb-2">
          <label for="username">Username</label>
        </div>
        <div class="col-6 mb-2">
          <input type="text" name="username" id="username-input" class="rounded">
        </div>
        <center>
        <button type="submit" class="btn btn-primary text-align-center mt-4" href="">Simpan</button>
        </center>
      </div>
      </form>
      </div>
    </div>
  </div>
</div>

<script>
  const data = @json($users);
  const modalButtons = document.querySelectorAll('[data-bs-toggle]');

        modalButtons.forEach(button => {
            button.addEventListener('click', () => {
                const nama = document.getElementById('nama');
                const sekolah = document.getElementById('sekolah');
                const username = document.getElementById('username-input');
                const form = document.getElementById('form');
                console.log(username);

                data.forEach(user => {
                    if (button.value == user.id) {
                      console.log(user);
                        nama.value = user.fullname;
                        sekolah.value = user.school;
                        username.value = user.username;
                        // form.action = '/users/'user.id;
                    }
                });
    })
})
</script>
@endsection
