<?php
	$host	= "localhost";
	$user	= "root";
	$password = "";
	$database = "db_sekolah";

	$koneksi = mysqli_connect($host, $user, $password, $database);
	if ($koneksi) {
	}
	mysqli_select_db($koneksi, $database);
?>