<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="/assets/styles/style.css">

  <!-- Trix Editor -->
  <link rel="stylesheet" type="text/css" href="/assets/style/trix.css">
  <script type="text/javascript" src="/assets/js/trix.js"></script>

  <!-- Tidak berjalan -->
  <style>
    trix-tollbar [data-trix-button-group="file-tools"] {
      display:none;
    }
</style>

  <!-- Judulnya dinamis tergantung di halaman mana -->
  <title>RPC Tryout | {{ $title }}</title>
</head>

<body>
  <!-- Mengambil navbar -->

  <div class="container mt-4">
    <!-- Berisi apapun di section 'container' -->
    @yield('container')
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>