<?php
include_once("koneksi.php");

// Memeriksa apakah terdapat parameter id yang dikirim melalui URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Menghapus data mahasiswa berdasarkan id
    $result_delete = mysqli_query($mysqli, "DELETE FROM absen WHERE id=$id");

    // Redirect kembali ke halaman utama setelah menghapus data
    header("Location: index.php");
}
?>
