<!-- KONEKSI -->
<?php
	include 'koneksi.php';

	$id_ekstra 	= '';
	$nama_ekstra = '';

	if (isset($_GET['ubah'])) {
		$id_ekstra = $_GET['ubah'];

		$update = "SELECT * FROM ekstra WHERE id_ekstra = '$id_ekstra';";
		$sql = mysqli_query($koneksi, $update);

		$hasil = mysqli_fetch_assoc($sql);

		$id_ekstra 	= $hasil['id_ekstra'];
		$nama_ekstra = $hasil['nama_ekstra'];
	}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- BOOTSTRAP -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/bootstrap.min.js"></script>
	<title>buat_crud</title>
</head>
<body>

	<nav class="navbar navbar-light bg-light mb-4">
		<a class="navbar-brand" href="#">
			Tambah Data
		</a>
	</nav>
	<div class="container">


		<form method="POST" action="proses_ekstra.php" enctype="multipart/form-data">

			<!-- USER INPUT EKSTRA -->
			<div class="form-group row">
				<label for="id_ekstra" class="col-sm-2 col-form-label">
					id_ekstra
				</label>
				<div class="col-sm-10">
					<!-- Biarkan input type="text" ini kosong -->
					<input required type="text" name="id_ekstra" class="form-control" id="id_ekstra" placeholder="" value="<?php echo $id_ekstra; ?>">
				</div>
			</div>
			<div class="form-group row">
				<label for="nama_ekstra" class="col-sm-2 col-form-label">
					nama_ekstra
				</label>
				<div class="col-sm-10">
					<input required type="text" name="nama_ekstra" class="form-control" id="nama_ekstra" placeholder="" value="<?php echo $nama_ekstra; ?>">
				</div>
			</div>

			<!-- TOMBOL UPDATE & EXIT -->
			<div class="mb-3 row">
				<div class="col">
					<?php
					if (isset($_GET['ubah'])) {
						?>
						
						<?php
					} else {
						?>
						<button type="submit" name="aksi" value="insert" class="btn btn-primary">
							Tambahkan
						</button>
						<?php
					}
					?>
					<a href="ekstra.php" type="button" class="btn btn-danger">
						Batal
					</a>
				</div>
			</div>
		</form>
	</div>
</body>
</html>
