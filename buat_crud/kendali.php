<?php
include 'koneksi.php';

$id_siswa   = '';
$Nama_Siswa = '';
$NISN       = '';
$Gender     = '';
$Alamat     = '';
$id_ekstra  = '';

if (isset($_GET['ubah'])) {
    $id_siswa = $_GET['ubah'];

    $update = "SELECT * FROM siswa WHERE id_siswa = '$id_siswa';";
    $sql = mysqli_query($koneksi, $update);

    $hasil = mysqli_fetch_assoc($sql);

    $Nama_Siswa = $hasil['nama_siswa'];
    $NISN       = $hasil['nisn'];
    $Gender     = $hasil['gender'];
    $Alamat     = $hasil['alamat'];
    $id_ekstra  = $hasil['id_ekstra'];
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

    <!-- USER INPUT -->
    <div class="container">
        <form method="POST" action="proses.php" enctype="multipart/form-data">
            <input type="hidden" value="<?php echo $id_siswa; ?>" name="id_siswa">
            <div class="form-group row">
                <label for="Nama Siswa" class="col-sm-2 col-form-label">
                    Nama Siswa
                </label>
                <div class="col-sm-10">
                    <input required type="text" name="Nama" class="form-control" 
                    id="Nama Siswa" placeholder="Firman Utina" value="<?php echo $Nama_Siswa; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="NISN" class="col-sm-2 col-form-label">
                    NISN
                </label>
                <div class="col-sm-10">
                    <input required type="text" name="NISN" class="form-control" 
                    id="NISN" placeholder="32602000081" value="<?php echo $NISN; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="Gender" class="col-sm-2 col-form-label">
                    Gender
                </label>
                <div class="col-sm-10">
                    <div class="form-check form-check-inline">
                        <input required class="form-check-input" type="radio" name="Jkel" id="Gender1" value="Laki-laki" <?php if ($Gender == 'Laki-laki') { echo "checked"; } ?>>
                        <label class="form-check-label" for="Gender1">Laki-laki</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input required class="form-check-input" type="radio" name="Jkel" id="Gender2" value="Perempuan" <?php if ($Gender == 'Perempuan') { echo "checked"; } ?>>
                        <label class="form-check-label" for="Gender2">Perempuan</label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="Foto Siswa" class="col-sm-2 col-form-label">
                    Foto Siswa
                </label>
                <div class="col-sm-10">
                    <input type="file" class="form-control-file" name="Foto Siswa" id="Foto Siswa" accept="image/*">
                </div>
            </div>
            <div class="form-group row">
                <label for="Alamat" class="col-sm-2 col-form-label">
                    Alamat
                </label>
                <div class="col-sm-10">
                    <textarea required class="form-control" id="Alamat" name="Alamat" rows="3"><?php echo $Alamat; ?></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="id_ekstra" class="col-sm-2 col-form-label">
                    id_ekstra
                </label>
                <div class="col-sm-10">
                    <input required type="text" name="id_ekstra" class="form-control" 
                    id="id_ekstra" placeholder="id ekstra" value="<?php echo $id_ekstra; ?>">
                </div>
            </div>

            <div class="mb-3 row">
                <div class="col">
                   
                	<!-- TOMBOL UPDATE & EXIT -->
					<?php
						if(isset($_GET['ubah'])){
							?>
								<button type="submit" name="aksi" value="update" class="btn btn-primary">
									Simpan Perubahan
								</button>
							<?php
								} else{
									?>
										<button type="submit" name="aksi" value="insert" class="btn btn-primary">
											Tambahkan
										</button>
										<?php
										}
									?>
					<a href="index.php" type="button" class="btn btn-danger">
						Batal
					</a>
				</div>
			</div>
  	</div>	
</body>
</html>