<?php
include 'koneksi.php';

if (isset($_POST['aksi'])) {
    if ($_POST['aksi'] == "insert") {
        $id_ekstra   = $_POST['id_ekstra'];
        $nama_ekstra = $_POST['nama_ekstra'];

        //CREATE
        $checkQuery = "SELECT id_ekstra FROM ekstra WHERE id_ekstra = '$id_ekstra'";
        $checkResult = mysqli_query($koneksi, $checkQuery);

        if (mysqli_num_rows($checkResult) > 0) {
            echo "Gagal menambahkan data. ID Ekstra sudah ada.";
        } else {
            $query = "INSERT INTO ekstra (id_ekstra, nama_ekstra) VALUES (?, ?)";
            $stmt = mysqli_prepare($koneksi, $query);
            mysqli_stmt_bind_param($stmt, "ss", $id_ekstra, $nama_ekstra);

            $sql = mysqli_stmt_execute($stmt);
            if ($sql) {
                header("location: ekstra.php");
            } else {
                echo "Gagal menambahkan data. Error: " . mysqli_error($koneksi);
            }
            mysqli_stmt_close($stmt);
        }
    } 
}

//DELETE
if (isset($_GET['hapus'])) {
    $id_ekstra = $_GET['hapus'];

    $query = "DELETE FROM ekstra WHERE id_ekstra = '$id_ekstra'";
    $sql = mysqli_query($koneksi, $query);

    if ($sql) {
        header("location: ekstra.php");
    } else {
        echo "Gagal menghapus data. Error: " . mysqli_error($koneksi);
    }
}
?>
