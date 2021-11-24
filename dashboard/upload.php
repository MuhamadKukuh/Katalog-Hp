<?php 
  include '../db.php';

  $os = mysqli_query($koneksi, "SELECT * FROM os");
 ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Upload</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">

    

    <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Toko Hp</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="../home.php">Home</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="index.php">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#">
              <span data-feather="file"></span>
              Upload
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <!-- My Content -->
      <div class="container mt-5 pt-3 pb-3">
        <h5 class="text-center">
          Isi Data Berikut
        </h5>
        <form action="../route/web.php" method="POST" enctype="multipart/form-data">
          <div>
            <label for="formFileLg" class="form-label">Masukan Gambar</label>
            <input class="form-control form-control-lg mb-4" id="formFileLg" name="file" type="file" required>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label for="inputEmail4" class="form-label">Nama HP</label>
              <input type="text" class="form-control" id="inputEmail4" name="hp" required>
            </div>
            <div class="col-md-6">
              <label for="inputPassword4" class="form-label">Brand</label>
              <input type="text" class="form-control" id="inputPassword4" name="merk" required>
            </div>
            <div class="col-12">
              <label for="inputAddress" class="form-label" name="chipset">Chipset</label>
              <input type="text" class="form-control" id="inputAddress" name="chipset" name="chipset" required>
            </div>
            <div class="col-md-6">
              <label for="inputCity" class="form-label">Rom(Penyimpanan Internal)</label>
              <input type="number" class="form-control" id="inputCity" name="rom" required>
            </div>
            <div class="col-md-4">
              <label for="inputState" class="form-label">O.S</label>
              <select id="inputState" class="form-select" name="os">
                <?php foreach ($os as $key ): ?>
                  <option value="<?php echo $key["id_os"] ?>"><?php echo $key["os"] ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="col-md-2">
              <label for="inputZip" class="form-label">Ram</label>
              <input type="number" class="form-control" id="inputZip" name="ram" required>
            </div>
            <div class="col-md-6">
              <label for="inputCity" class="form-label">Batrai</label>
              <input type="number" class="form-control" id="inputCity" name="batrai" required>
            </div>
            <div class="col-md-4">
              <label for="inputState" class="form-label">Tanggal Perilisan</label>
              <input type="date" id="inputState" name="date" class="form-control" required>  
            </div>
            <div class="col-md-2">
              <label for="inputZip" class="form-label">Harga</label>
              <input type="number" class="form-control" id="inputZip" name="harga" required>
            </div>
          </div>
          <div class="form-floating mt-3">
            <textarea class="form-control" placeholder="Leave a comment here" name="deskripsi" id="floatingTextarea" required></textarea> 
            <label for="floatingTextarea">Deskripsi Hp</label>
          </div>
          <div class="col-12">
              <button type="submit" class="btn btn-outline-dark mt-3" name="upload">Upload</button>
            </div>
        </form>
      </div>
    </main>
  </div>
</div>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>
