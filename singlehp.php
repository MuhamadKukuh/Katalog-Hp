<?php 
	session_start();
	include 'db.php';
	$_SESSION['hp'];

	if (!isset($_SESSION['hp'])) {
		header("Location: home.php");
	}else{
		$id = $_SESSION['hp'];
	}

	$data = mysqli_query($koneksi, "SELECT * FROM hp WHERE id_hp='$id'");

  $top  = mysqli_query($koneksi, "SELECT * FROM hp ORDER BY id_hp DESC LIMIT 3");
	$row  = mysqli_fetch_assoc($data);
 ?>
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
              <a class="nav-link active" aria-current="page" href="home.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="dashboard/index.php">Dashboard</a>
            </li>
          </ul>
          <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-light" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>

    <div class="container mt-4">
      <div class="row text-secondary">
        <div class="col-6">
          <img src="<?php echo "assets/gambar/". $row["gambar"] ?>" class="rounded" style="max-width: 500px; max-height: 700px; min-width: 500px; min-height: 500px;">
        </div>
        <div class="col-6  text-start">
          <h3 class="text-center"><?php echo $row["nama_hp"] ?></h3>
          <p class="text-center mb-3  ">By. <?php echo $row["merk"] ?></p>
          <div class="row">
            <div class="col-4 col-md-6 col-sm-6 text-start">
              <h5>Ram</h5>
              <h5>Chipset</h5>
              <h5>Internal</h5>
              <h5>Batrai</h5>
              <h5>Harga</h5>
              <h5>Tanggal Perilisan</h5>
            </div>
            <div class="col-8 col-md-6 col-sm-6 text-start">
              <h5>: <?php echo $row["ram"] ?> GB</h5>
              <h5>: <?php  echo $row["chipset"]; ?></h5>
              <h5>: <?php  echo $row["internal"]; ?>GB</h5>
              <h5>: <?php if ($row["batrai"] == 0) {
                echo "-";
              }else{
                echo $row["batrai"]. "Mah";
              }
               ?> 
              </h5>
              <h5>: <?php if ($row["harga"] == 0) {
                echo "-";
              }else{
              echo "Rp ". number_format($row["harga"], 0, ".", ".");
              }  ?></h5>
              <h5>: <?php  echo $row["release_date"] ?></h5>
            </div>
          </div>
          <div class="row mt-3">
            <h5>Deskripsi: </h5>
            <p>
              <?php echo $row["deskripsi"] ?>
            </p>
          </div>
        </div>
        
      </div>
    </div>

    <div class="container rounded mt-5" style="background-color: #F7F7F7;">
      <div class="row d-flex justify-content-center pt-3 pb-3">
        <?php foreach ($top as $key): ?>
          <?php if ($key["id_hp"] == $id): ?>
            <?php  continue; ?>
          <?php endif ?>
          <div class="card col-4 col-md-6 col-sm-12 mt-3 pb-3 pt-2" style="width: 18rem; margin-left: 10px;">
            <img src="<?php echo "assets/gambar/". $key["gambar"] ?>" class="card-img-top" alt="Gambar" >
            <div class="card-body">
              <h5 class="card-title"><?php echo $key["nama_hp"] ?></h5>
              <p class="card-text"><?php echo substr($key["deskripsi"], 1, 100) ?>.</p>
              <form action="route/web.php" method="POST">
                <button type="submit" value="<?php echo $key["id_hp"] ?>" class="btn btn-outline-primary " name="lihatasw">Lihat lebih lengkap</button>
              </form>
            </div>
          </div>
        <?php endforeach ?>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>