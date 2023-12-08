<?php
// Menginclude file koneksi.php untuk koneksi ke database
include_once("koneksi.php");

// Memeriksa apakah form telah disubmit untuk melakukan update
if (isset($_POST['Update'])) {
    // Mengambil nilai ID dari input form
    $id = $_POST['id'];

    // Mengambil nilai NPM, nama, dan matkul dari input form
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $matkul = $_POST['matkul'];

    // Melakukan query update ke database
    $update = mysqli_query($mysqli, "UPDATE absen SET npm=$npm, nama='$nama', matkul='$matkul' WHERE id=$id");

    // Memeriksa apakah proses update berhasil atau tidak
    if ($update) {
        // Jika berhasil, redirect ke halaman utama
        header("Location: index.php");
        exit();
    } else {
        // Jika gagal, tampilkan pesan error
        echo "Gagal melakukan update data: " . mysqli_error($mysqli);
    }
}
?>
