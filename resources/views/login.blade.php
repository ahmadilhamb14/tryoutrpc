<!-- Mengambil Layout utama -->
@extends('layouts.main')

<!-- Berisi hal-hal berbeda dari setiap halaman yang akan di tampilkan di layout utama -->
@section('container')
<div class="row justify-content-center" width="100">
    <section align="center" class="wrapper col-6 text-center bg-warning rounded-start pt-2 py-4" >
        <div class="form signup">
            <header class="mb-2">Sign In</header>
            <form action="/signin" method="post">
                @csrf
                <input class="mb-2" type="text" name="fullname" placeholder="Full Name" required />
                <input class="mb-2" type="text" name="school" placeholder="School" required />
                <input class="mb-2" type="text" name="username" placeholder="Username" required />
                <input type="password" name="password" placeholder="Password" required />
                <button type="submit" class="btn btn-light mb-2 p-2 rounded b-0">Sign In</button>
                @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                @if(session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('loginError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <br>
                <br>
            </form>
        </div>

        <div id="login" class="form login mb-2">
            <header>Login</header>

            <form method="post" action="{{ route('login') }}">
                @csrf
                <input class="mb-3" type="text" name="username" placeholder="Username" required />
                <input type="password" name="password" placeholder="Password" required />
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
@endsection

<!-- extends section include yield disebut directive blade -->