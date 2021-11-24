<?php 
	include '../db.php';

	function uploadHp($data){
		global $koneksi;

		$nama_hp   = $data["hp"];
		$ram 	   = $data["ram"];
		$rom 	   = $data["rom"];
		$deskripsi = $data["deskripsi"];
		$merk 	   = $data["merk"];
		$os  	   = $data["os"];
		$chipset   = $data["chipset"];
		$realese   = $data["date"];
		$batrai    = $data["batrai"];
		$harga 	   = $data["harga"];



			$ekstensi_diperbolehkan	= array('png','jpg','jpeg');
			$gambar = $_FILES["file"]["name"];
			$x = explode('.', $gambar);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['file']['size'];
			$file_tmp = $_FILES['file']['tmp_name'];	

			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 2044070){
					$date = date("Y-m-d");		
					move_uploaded_file($file_tmp, '../assets/gambar/'.$gambar);
					$isi = mysqli_query($koneksi,"INSERT INTO hp(`nama_hp`, `id_os`, `ram`, `internal`, `chipset`,`merk`, `deskripsi`, `date`, `gambar`, `harga`, `batrai`, `release_date`) VALUES ('$nama_hp', '$os', '$ram', '$rom', '$chipset', '$merk', '$deskripsi', '$date', '$gambar', '$harga', '$batrai', '$realese')");

					if($isi){
						session_start();
						$_SESSION['berhasil'] = true;
						header("Location: ../dashboard/index.php");
					}else{
						header("Location: ../dashboard/upload.php");
					}
				}else{
					header("Location: ../dashboard/upload.php");
				}
			}else{
				header("Location: ../dashboard/upload.php");
			}
	}

	function lihatHp($data){
		global $koneksi;
		$id = $data["lihatasw"];

		$verif = mysqli_query($koneksi, "SELECT * FROM hp WHERE id_hp='$id' ");

		if ($verif) {
			session_start();
			$_SESSION["hp"] = $id;
			header("Location: ../singlehp.php");
		}
		
	}

	function updateHp($data){
		global $koneksi;

		$id        = $data["update"];
		$nama_hp   = $data["hp"];
		$ram 	   = $data["ram"];
		$rom 	   = $data["rom"];
		$deskripsi = $data["deskripsi"];
		$merk 	   = $data["merk"];
		$os  	   = $data["os"];
		$chipset   = $data["chipset"];
		$realese   = $data["date"];
		$batrai    = $data["batrai"];
		$harga 	   = $data["harga"];



			$ekstensi_diperbolehkan	= array('png','jpg','jpeg');
			$gambar = $_FILES["file"]["name"];
			$x = explode('.', $gambar);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['file']['size'];
			$file_tmp = $_FILES['file']['tmp_name'];	

			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 2044070){
					$date = date("Y-m-d");		
					move_uploaded_file($file_tmp, '../assets/gambar/'.$gambar);
					$update = mysqli_query($koneksi,"UPDATE hp SET nama_hp='$nama_hp	', `id_os`='$os',`ram`='$ram',`internal`='$rom',`chipset`='$chipset',`merk`='$merk',`deskripsi`='$deskripsi',`date`='$date',`gambar`='$gambar',`harga`='$harga',`batrai`='$batrai',`release_date`='$realese' WHERE id_hp = '$id' ");

					if($update){
						session_start();
						$_SESSION['berhasil'] = true;
						header("Location: ../dashboard/index.php");
					}else{
						header("Location: ../dashboard/upload.php");
					}
				}else{
					header("Location: ../dashboard/upload.php");
				}
			}else{
				header("Location: ../dashboard/upload.php");
			}
	}

	function deleteHp($data){
		global $koneksi;

		$id = $data["delete"];

		$delete = mysqli_query($koneksi, "DELETE FROM hp WHERE id_hp='$id' ");

		if ($delete) {
			header("Location: ../dashboard/index.php");
		}
	}
 ?>