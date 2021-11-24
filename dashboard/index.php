<?php 
  include '../db.php';

  $data = mysqli_query($koneksi, "SELECT * FROM hp ORDER BY id_hp DESC");

  $no = 1;
 ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Dashboard</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    

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
  <input class="form-control form-control-dark w-100" type="text" onkeyup="cariSiswa()" id="cari" placeholder="Search" aria-label="Search">
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
            <a class="nav-link active" aria-current="page" href="#">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="upload.php">
              <span data-feather="file"></span>
              Upload
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
      </div>
      <!-- My Content -->
      <div class="container mt-5">
        <div class="row">
          <table class="table col-12 col-md-6 col-sm-12 table-striped" id="daftarSiswa">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Merk</th>
              <th scope="col">Brand</th>
              <th scope="col">Tanggal upload</th>
              <th scope="col">Update | Delete</th>
            </tr>
          </thead>
          <tbody class="">
            <?php foreach ($data as $key ): ?>
              <tr>
              <th scope="row"><?php echo $no++; ?></th>
              <td><?php echo $key["nama_hp"] ?></td>
              <td><?php echo $key["merk"] ?></td>
              <td><?php echo $key["date"] ?></td>
              <td>
                <form action="../route/web.php" method="POST">
                  <a href="edit.php?id=<?php echo $key["id_hp"] ?>" class="btn btn-outline-dark">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                      <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                      <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                    </svg>
                  </a> | 
                  <button class="btn btn-outline-dark" name="delete" value="<?php echo $key["id_hp"] ?>">
                    <i class="bi bi-file-earmark-excel-fill"></i>
                  </button> 
                </form>
              </td>
            </tr>
            <?php endforeach ?>
          </tbody>
        </table>
        </div>
      </div>
    </main>
  </div>
</div>

    <script src="../assets/js/main.js" type=""></script>
    <script >
      function cariSiswa(){
      var input = document.getElementById("cari");
      var filter = input.value.toLowerCase();
      var ul = document.getElementById("daftarSiswa");
      var li = document.querySelectorAll("tr")
      console.log(li)
      for(var i = 0; i<li.length; i++){
        var ahref = document.querySelectorAll("tr")[i];
        if(ahref.innerHTML.toLowerCase().indexOf(filter) > -1){
          li[i].style.display = "";
        }else{
          li[i].style.display = "none";
        }
      }
    }
    </script>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>
