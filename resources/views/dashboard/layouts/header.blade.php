<div>
        <nav class="navbar" style="background-color: #424242; height: max-content;" >
            <div class="container-fluid" >
              <a class="navbar-brand " href="#" style="font-size:30sp; font-weight: 500; margin-left: 12px; color: #FFC107"  >
              <img
							src="assets/img/logo.jpeg"
							alt="Logo"
							width="60"
							class="rounded-circle px-2"
						/>
                Ranu<span style="color: aliceblue;">PrimaCollege</span>
              </a>
              <div class="dropdown" style="margin-right: 10px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16" s>
                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.
                    001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                  </svg>
                <button class="btn btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #424242; border: none; box-shadow: none;font-size: 30sp; font-weight: 500; color: #FFC107">
                    Nama Pengguna
                  </button>
                  <ul class="dropdown-menu">
								<li>
									<hr class="dropdown-divider" />
								</li>
								<li>
									<form action="/logout" method="POST">
                    @csrf
										<button type="submit" class="dropdown-item">
											<i class="bi bi-box-arrow-right"></i> Logout
										</button>
									</form>
								</li>
							</ul>
            </div>
            </div>
          </nav>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>