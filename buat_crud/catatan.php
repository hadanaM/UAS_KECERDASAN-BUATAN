<?php
	include 'koneksi.php';

	$query = "SELECT * FROM catatan;";
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
			<h1 class="mt-4">Data Catatan Siswa</h1>
			<figure>
				<blockquote class="blockquote">
			  		<p>Berisi data yang telah disimpan di database.</p>
			  </blockquote>
			  <figcaption class="blockquote-footer">
			  	CRUD <cite title="Source Title">Creat Read Update Delete</cite>
			  </figcaption>
			</figure>

			<!-- TABEL CATATAN -->
			<table class="table table-bordered table-hover">
			  <caption>List of users</caption>
			  <thead>
			    <tr>
			      <th scope="col"><center>No.</center></th>
			      <th scope="col">id_catatan</th>
			      <th scope="col">id_siswa</th>
			      <th scope="col">id_ekstra</th>
			      <th scope="col">keterangan</th>
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
			      		echo $hasil['id_catatan'];
					?>
			      </td>
			      <td>
			      	<?php 
			      		echo $hasil['id_siswa'];
					?>
			      </td>
			      <td>
			      	<?php 
			      		echo $hasil['id_ekstra'];
					?>
			      </td>
			      <td>
			      	<?php 
			      		echo $hasil['keterangan'];
					?>
			      </td>
			     
			     <!-- TOMBOL DELETE -->
			      <td>
			      	<a href="catatan.php?hapus=<?php 
			      		echo $hasil['id_catatan'];
					?>" type="button" class="btn btn-danger btn-sm" onClick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Tersebut?')">
			      		Delete
			      	</a>
			      </td>
			    </tr>
			    <!-- DELETE -->
			    <?php
				    if (isset($_GET['hapus'])) {
					    $id_catatan = $_GET['hapus'];

					    $query = "DELETE FROM catatan WHERE id_catatan = '$id_catatan'";
					    $sql = mysqli_query($koneksi, $query);

					    if ($sql) {
					        header("location: catatan.php");
					    } else {
					        echo "Gagal menghapus data. Error: " . mysqli_error($koneksi);
					    }
					}
			    }
			    ?>
			 </tbody>
		</table>
	</form>
</div>