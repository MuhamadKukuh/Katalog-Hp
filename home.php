<?php include 'db.php';
  $data= mysqli_query($koneksi, "SELECT * FROM hp ORDER BY id_hp DESC");
 ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Toko Hp</title>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container">
        <a class="navbar-brand" style="font-weight: bold;" href="#">Toko Hp</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="dashboard/index.php">Dashboard</a>
            </li>
          </ul>
          <form class="d-flex" action="" method="POST">
            <input class="form-control me-2" name="cari" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-light" type="submit" name="carihp">Search</button>
          </form>
        </div>
      </div>
    </nav>

    <div class="container mt-4">
      <div class="row d-flex  justify-content-center">
        <?php if (!isset($_POST["carihp"])){ ?>
          <?php foreach ($data as $key ): ?>
            <div class="card col-4 col-md-6 col-sm-12 mt-3" style="width: 18rem; margin-left: 10px;">
              <img src="<?php echo "assets/gambar/". $key["gambar"] ?>" class="card-img-top" alt="Gambar" style="max-width: 400px;">
              <div class="card-body">
                <h5 class="card-title"><?php echo $key["nama_hp"] ?></h5>
                <p class="card-text"><?php echo substr($key["deskripsi"], 1, 100) ?>.</p>
                <form action="route/web.php" method="POST">
                  <button type="submit" value="<?php echo $key["id_hp"] ?>" class="btn btn-outline-primary" name="lihatasw">Lihat lebih lengkap</button>
                </form>
              </div>
            </div>
          <?php endforeach ?>
        <?php }elseif (isset($_POST["carihp"])) { ?>
          <?php 
          $cari = $_POST['cari'];
          $datapencarian = mysqli_query($koneksi, "SELECT * FROM hp WHERE nama_hp LIKE '%". $cari ."%' ");
          ?>
          <?php if ($cari == null || 0){ ?>
            <?php foreach ($data as $key ): ?>
              <div class="card col-4 col-md-6 col-sm-12 mt-3" style="width: 18rem; margin-left: 10px;">
                <img src="<?php echo "assets/gambar/". $key["gambar"] ?>" class="card-img-top" alt="Gambar" style="max-width: 400px;">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $key["nama_hp"] ?></h5>
                  <p class="card-text"><?php echo substr($key["deskripsi"], 1, 100) ?>.</p>
                  <form action="route/web.php" method="POST">
                    <button type="submit" value="<?php echo $key["id_hp"] ?>" class="btn btn-outline-primary" name="lihatasw">Lihat lebih lengkap</button>
                  </form>
                </div>
              </div>
            <?php endforeach ?>
          <?php }else{ ?>
              <?php foreach ($datapencarian as $key ): ?>
                <div class="card col-4 col-md-6 col-sm-12 mt-3" style="width: 18rem; margin-left: 10px;">
                  <img src="<?php echo "assets/gambar/". $key["gambar"] ?>" class="card-img-top" alt="Gambar" style="max-width: 400px;">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $key["nama_hp"] ?></h5>
                    <p class="card-text"><?php echo substr($key["deskripsi"], 1, 100) ?>.</p>
                    <form action="route/web.php" method="POST">
                      <button type="submit" value="<?php echo $key["id_hp"] ?>" class="btn btn-outline-primary" name="lihatasw">Lihat lebih lengkap</button>
                    </form>
                  </div>
                </div>
              <?php endforeach ?>
          <?php  } ?>
        <?php } ?>
        
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>