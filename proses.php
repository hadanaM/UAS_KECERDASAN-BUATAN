<?php
	include 'koneksi.php';

	if(isset($_POST['aksi'])){
		if($_POST['aksi'] == "insert"){

			//EKSEKUSI CREATE
			$Nama_Siswa = $_POST['Nama'];
			$NISN 		= $_POST['NISN'];
			$Gender 	= $_POST['Jkel'];
			$Foto 		= $_FILES['Foto_Siswa']['name'];
			$Alamat 	= $_POST['Alamat'];
			$id_ekstra 		= $_POST['id_ekstra'];

			$direktori = "img/";
			$tmpFile = $_FILES['Foto_Siswa']['tmp_name'];
			move_uploaded_file($tmpFile, $direktori.$Foto);

			$query = "INSERT INTO siswa VALUES(null, '$NISN', '$Nama_Siswa', '$Gender', '$Foto', '$Alamat', '$id_ekstra')";
			$sql = mysqli_query($koneksi, $query);

			if($sql){
				header("location: siswa.php");
			} else {
				echo $query;
			}


			//EKSEKUSI UPDATE
			} else if($_POST['aksi'] == "update"){
			$id_siswa 	= $_POST['id_siswa'];
			$Nama_Siswa = $_POST['Nama'];
			$NISN 		= $_POST['NISN'];
			$Gender 	= $_POST['Jkel'];
			$Alamat 	= $_POST['Alamat'];
			$id_ekstra 		= $_POST['id_ekstra'];

			$queryshow = "SELECT * FROM siswa WHERE id_siswa = '$id_siswa';";
			$sqlshow = mysqli_query($koneksi, $queryshow);
			$hasil = mysqli_fetch_assoc($sqlshow);

			if($_FILES['Foto_Siswa']['name'] == ""){
				$Foto = $hasil['Foto_Siswa'];
			} else {
				$Foto = $_FILES['Foto_Siswa']['name'];
				unlink("img/".$hasil['foto_siswa']);
				move_uploaded_file($_FILES['Foto_Siswa']['tmp_name'],'img/'.$_FILES['Foto_Siswa']['name']);
			}

			$update = "UPDATE siswa SET NISN= '$NISN', Nama_Siswa='$Nama_Siswa', Gender='$Gender', Alamat='$Alamat',id_ekstra='$id_ekstra' , Foto_Siswa= '$Foto' 
			WHERE id_siswa='$id_siswa';";
			$sql = mysqli_query($koneksi, $update);
			header("location: siswa.php");
		}
	}


	//EKSEKUSI DELETE
	if (isset($_GET['hapus'])){
		$id_siswa = $_GET['hapus'];

		$queryshow = "SELECT * FROM siswa WHERE id_siswa = '$id_siswa';";
		$sqlshow = mysqli_query($koneksi, $queryshow);
		$hasil = mysqli_fetch_assoc($sqlshow);
		unlink("img/".$hasil['foto_siswa']);

		$query = "DELETE FROM siswa WHERE id_siswa = '$id_siswa';";
		$sql = mysqli_query($koneksi, $query);

		if($sql){
			header("location: siswa.php");
		} else {
			echo $query;
		}
	}
?>