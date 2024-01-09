<?php
	include 'koneksi.php';

	$query = "SELECT * FROM view_siswa;";
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
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
			
			<!-- TABEL VIEW -->
			<table class="table table-bordered table-hover">
			  <caption>List of users</caption>
			  <thead>
			    <tr>
			      <th scope="col"><center>No.</center></th>
			      <th scope="col">id_siswa</th>
			      <th scope="col">nama_siswa</th>
			      <th scope="col">Gender</th>
			      <th scope="col">NISN</th>
			      <th scope="col">id_ekstra</th>
			      <th scope="col">nama_ekstra</th>
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
			      		echo $hasil['id_siswa'];
					?>
			      </td>
			      <td>
			      	<?php 
			      		echo $hasil['nama_siswa'];
					?>
			      </td>
			      <td>
			      	<?php 
			      		echo $hasil['gender'];
					?>
			      </td>
			      <td>
			      	<?php 
			      		echo $hasil['nisn'];
					?>
			      </td>
			      <td>
			      	<?php 
			      		echo $hasil['id_ekstra'];
					?>
			      </td>
			      <td>
			      	<?php 
			      		echo $hasil['nama_ekstra'];
					?>
			      </td>
			      
			    <?php
			    	}
			    ?>

			    <!-- Query Jumlah Data -->
			    <?php
			    	$query = "SELECT jumlahdata() AS total";
			    	$hasil = $koneksi->query($query);
			    	if($hasil){
			    		$kolom = $hasil->fetch_assoc();
			    		$jumlahdata = $kolom['total'];
			    	}else{
			    		echo "Error: ".$koneksi->error;
			    	}
			    ?>

			    <!-- Tombol Jumlah Data -->
	            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
	              Total Data
	            </button>

	            <!-- Bootstrap Jumlah Data -->
	            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	              <div class="modal-dialog">
	                <div class="modal-content">
	                  <div class="modal-header">
	                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Jumlah Data</h1>
	                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	                  </div>

	                  <form method="POST" action="index.php">
	                  <input type="hidden" name="total" value="<?= $total?>">
	                  <div class="modal-body">

	                    <div class="form-label">Jumlah Data Siswa = "<?=$jumlahdata ?>"</div>    
	                  </div>
	                    <div class="modal-footer">
	                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>               
	                  </div>
	                </div>
	              </div>
	            </div>
			  </tbody>
			</table>
		</form>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>