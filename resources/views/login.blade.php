<!-- Mengambil Layout utama -->
@extends('layouts.main')

<!-- Berisi hal-hal berbeda dari setiap halaman yang akan di tampilkan di layout utama -->
@section('container')
<div class="row justify-content-center" width="100">
    <section align="center" class="wrapper col-6 text-center bg-warning rounded-start pt-2 py-4" >
        <div class="form signup">
            <header class="mb-2">Sign In</header>
            <form method="post">
                <input class="mb-2" type="text" name="nama" placeholder="Full Name" required />
                <input class="mb-2" type="text" name="sekolah" placeholder="School" required />
                <input class="mb-2" type="text" name="email" placeholder="Username" required />
                <input type="password" name="password" placeholder="Password" required />
                <input class="mb-2" type="submit" name="signup" value="Sign In" />
                <br>
                <br>
                </form>
            </div>

        <div id="login" class="form login mb-2">
            <header>Login</header>
            <form method="get" action="/">
                <input class="mb-3" type="text" name="email" placeholder="Username" required />
                <input type="password" name="password" placeholder="Password" required />
                <input class="bg-warning" type="submit" name="login" value="Login" />
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