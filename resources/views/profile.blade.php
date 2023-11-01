<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/assets/styles/profile.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <title>Document</title>
</head>
<body>
    <div>
        <nav class="navbar" style="background-color: #424242; height: max-content;" >
            <div class="container-fluid" >
              <a class="navbar-brand " href="#" style="font-size:30sp; font-weight: 500; margin-left: 12px; color: #FFC107"  >
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="20" class="bi bi-image =" viewBox="0 0 16 16" style="margin-right: 10px;">
                    <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                    <path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z"/>
                  </svg>
                Ranu<span style="color: aliceblue;">PrimaCollege</span>
              </a>
              <div class="dropdown" style="margin-right: 10px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="20" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16" s>
                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.
                    001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                  </svg>
                <button class="btn btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #424242; border: none; box-shadow: none;font-size: 30sp; font-weight: 500; color: #FFC107">
                    Nama Pengguna
                  </button>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#" style="font-size: 30sp; font-weight: 500;">Logout</a></li>
                  </ul>
            </div>
            </div>
          </nav>
    </div>

    <div class="container-wrapper">
        <div class="sidebar" style="border-radius: 10px;">
            <div class="container py-2" style="background-color: #FFC107;" >
              <h4>Menu Utama</h4>
            </div>
            <div class="menu" >
              <a href="#">
                <i class="fa-solid fa-house"></i>
                Home</a>
              <a href="#" >
                  <i class="fa-solid fa-user"></i>
                   Profile</a>
              <a href="#">
                <i class="fa-solid fa-pen-to-square"></i>
                Tryout</a>
              <a href="#">
                <i class="fa-solid fa-trophy"></i>
                Result</a>
            </div>
        </div>

        <div class="profile">
            <div class="top">
                <div class="text" style="background-color: #FFC107;">
                    <h4>Profile</h4>
                </div>
                <div class="picture">
                    <i class="fa-regular fa-circle-user"></i>
                </div>
            </div>
            <div class="greeting">
                <h1>[Nama Pengguna]</h1>
                    <div class="row justify-content-center my-3">
                        <div class="col-4 mb-2">
                        Nama Lengkap
                        </div>
                        <div class="col-5 mb-2">
                        : Syifa
                        </div>
                        <div class="col-4 mb-2">
                        Asal Sekolah
                        </div>
                        <div class="col-5 mb-2">
                        : SMA XX
                        </div>
                        <div class="col-4 mb-2">
                        Username
                        </div>
                        <div class="col-5 mb-2">
                        : Sy1f4
                        </div>
                        <div class="col-4 mb-2">
                        Password
                        </div>
                        <div class="col-5 mb-2">
                        : *********
                        </div>
                  </div>

                  <button type="button" class="button mx-5 my-3 px-3">Ubah Profile</button>
            </div>
        </div>
        
    </div>
    
</body>
</html>