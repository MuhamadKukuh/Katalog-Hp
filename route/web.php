<?php 
include '../controller/controller.php';

if (isset($_POST['upload'])) {
	uploadHp($_POST);
}

if (isset($_POST["lihatasw"])) {
	lihatHp($_POST);
}

if (isset($_POST["update"])) {
	updateHp($_POST);
}
if (isset($_POST["delete"])) {
	deleteHp($_POST);
}
 ?>