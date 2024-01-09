<?php
	include 'koneksi.php';

	$query = "SELECT * FROM siswa;";
	$sql = mysqli_query($koneksi, $query);
	$nomor = 0;
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- BOOTSRAP -->
	<link rel="stylesheet" href="css/bootstrap.min.css" >
	<script src="js/bootstrap.min.js" ></script>

	<title>buat_crud</title>
</head>
<body>
	<!-- Botstrap Navbar -->
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="#">Navbar</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
	    <div class="navbar-nav">
	      <a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
	      <a class="nav-link" href="siswa.php">Siswa</a>
	      <a class="nav-link" href="ekstra.php">Ekstra</a>
	      <a class="nav-link" href="catatan.php">Catatan</a>
	    </div>
	  </div>
	</nav>

	<!-- JUDUL -->
	<div class="container">
			<h1 class="mt-4">Data Siswa</h1>
			<figure>
				<blockquote class="blockquote">
			  		<p>Berisi data yang telah disimpan di database.</p>
			  </blockquote>
			  <figcaption class="blockquote-footer">
			  	CRUD <cite title="Source Title">Creat Read Update Delete</cite>
			  </figcaption>
			</figure>

			<!-- TOMBOL CREATE -->
			<a href="kendali.php" type="button" class="btn btn-primary">
				Tambah Data
			</a>

			<!-- TABEL SISWA -->
			<table class="table table-bordered table-hover">
			  <caption>List of users</caption>
			  <thead>
			    <tr>
			      <th scope="col"><center>No.</center></th>
			      <th scope="col">Nama Siswa</th>
			      <th scope="col">NISN</th>
			      <th scope="col">Gender</th>
			      <th scope="col">Foto Siswa</th>
			      <th scope="col">Alamat</th>
			      <th scope="col">id ekstra</th>
			      <th scope="col">Aksi</th>
			    </tr>
			  </thead>
			  <tbody>
			  <?php
			  	while($hasil = mysqli_fetch_assoc($sql)){	
			  ?>
			    <tr>
			      <th scope="row"><center>
			      	<?php 
			      		echo ++$nomor;
					?>.
			      </center></th>
			      <td>
			      	<?php 
			      		echo $hasil['nama_siswa'];
					?>
			      </td>
			      <td>
			      	<?php 
			      		echo $hasil['nisn'];
					?>
			      </td>
			      <td>
			      	<?php 
			      		echo $hasil['gender'];
					?>
			      </td>
			      <td>
			      	<img src="img/<?php 
			      		echo $hasil['foto_siswa'];
					?>" style="width: 100px;">
			      </td>
			      <td>
			      	<?php 
			      		echo $hasil['alamat'];
					?>
			      </td>
			      <td>
			      	<?php 
			      		echo $hasil['id_ekstra'];
					?>
			      </td>

			      <!-- TOMBOL UPDATE & DELETE -->
			      <td>
			      	<a href="kendali.php?ubah=<?php 
			      		echo $hasil['id_siswa'];
					?>" type="button" class="btn btn-success btn-sm">
			      		Update
			      	</a>
			      	<a href="proses.php?hapus=<?php 
			      		echo $hasil['id_siswa'];
					?>" type="button" class="btn btn-danger btn-sm" onClick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Tersebut?')">
			      		Delete
			      	</a>
			      </td>
			    </tr>
			    <?php
			    	}
			    ?>
			  </tbody>
			</table>
		</form>
	</div>
</body>
</html>