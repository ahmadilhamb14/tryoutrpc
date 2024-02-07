<!-- Mengambil Layout utama -->
@extends('layouts.main')

<!-- Berisi hal-hal berbeda dari setiap halaman yang akan di tampilkan di layout utama -->
@section('container')
    <div class="row justify-content-center" width="100">
        <section align="center" class="wrapper col-6 text-center bg-warning rounded-start pt-4 py-4">
            <div class="form signup">
                <header class="mb-2">Sign In</header>
                <form action="/signin" method="post">
                    @csrf
                    <input class="@error('fullname') is-invalid @enderror" type="text" name="fullname"
                        placeholder="Full Name" required />
                    @error('fullname')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    {{-- <label for="kabupaten">Kabupaten:</label> --}}
                    <select class="mt-4 text-secondary p-2 @error('kabupaten') is-invalid @enderror" id="kabupaten"
                        name="kabupaten" style="height: 50px; border: none; border-radius: 8px">
                        <option value="">Pilih Kabupaten</option>
                        @foreach ($kabupatens as $kabupaten)
                            <option value="{{ $kabupaten->id }}">{{ $kabupaten->kabupaten }}</option>
                        @endforeach
                    </select>
                    @error('kabupaten')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <select class="mt-4 text-secondary p-2 @error('school') is-invalid @enderror" id="id_school"
                        name="id_school" style="height: 50px; border: none; border-radius: 8px">
                        <option value="">Pilih Sekolah</option>
                        {{-- Initial Sekolahs will be hidden --}}
                        @foreach ($sekolahs as $sekolah)
                            <option value="{{ $sekolah->id }}" data-kabupaten="{{ $sekolah->id_kabupaten }}"
                                style="display: none;">{{ $sekolah->sekolah }}</option>
                        @endforeach
                    </select>
                    @error('id_school')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <input class="mt-4 @error('username') is-invalid @enderror" type="text" name="username"
                        placeholder="Username" required />
                    @error('username')
                        <div class="m-0 invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <input class="mt-4 @error('password') is-invalid @enderror" type="password" name="password"
                        placeholder="Password" required />
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <button type="submit" class="btn btn-light mt-4 mb-4 p-2 rounded b-0">Sign In</button>
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if (session()->has('loginError'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('loginError') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <br>
                    <br>
                    <br><br>
                </form>
            </div>

            <div id="login" class="form login mb-2">
                <header>Login</header>

                <form method="post" action="{{ route('login') }}">
                    @csrf
                    <input type="text" name="username" placeholder="Username" required />
                    <input class="my-4" type="password" name="password" placeholder="Password" required />
                    <button type="submit" class="btn btn-warning p-2 rounded b-0">Login</button>
                    <!-- <input class="bg-warning" type="submit" name="login" value="Login" /> -->
                </form>
            </div>
        </section>
        <section class="rpc col-6 text-center rounded-end pt-2">
            <div class="brand">
                <img class="rounded-circle" src="assets/img/logo.jpeg" alt="" width="100">
                <h5 class="pt-3">Ranu Prima Collage Tryout</h5>
            </div>

        </section>
    </div>
    <script>
        const wrapper = document.querySelector(".wrapper"),
            signupHeader = document.querySelector(".signup header"),
            loginHeader = document.querySelector(".login header");

        loginHeader.addEventListener("click", () => {
            wrapper.classList.add("active");
        });
        signupHeader.addEventListener("click", () => {
            wrapper.classList.remove("active");
        });
    </script>

    <script>
        document.getElementById('kabupaten').addEventListener('change', function() {
            var selectedKabupaten = this.value;
            var sekolahOptions = document.querySelectorAll('#id_school option');

            sekolahOptions.forEach(function(option) {
                if (option.dataset.kabupaten == selectedKabupaten || selectedKabupaten === '') {
                    option.style.display = 'block';
                } else {
                    option.style.display = 'none';
                }
            });
        });
    </script>
@endsection

<!-- extends section include yield disebut directive blade -->
