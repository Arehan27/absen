<?php
// Konfigurasi koneksi ke database
$dbHost = 'localhost'; // Alamat server database
$dbName = 'absen';     // Nama database, ubah sesuai dengan nama database yang digunakan
$dbUsername   = 'root'; // Nama pengguna database
$dbPassword = '';       // Kata sandi pengguna database, kosongkan jika tidak ada kata sandi

// Menggunakan fungsi mysqli_connect untuk membuat koneksi ke database
$mysqli = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);
?>
