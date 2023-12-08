<?php
include_once("koneksi.php");

$result = mysqli_query($mysqli, "SELECT * FROM absen ORDER BY id DESC");

if (isset($_POST['Submit'])) {
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $matkul = $_POST['matkul'];

    $add = mysqli_query($mysqli, "INSERT INTO absen(npm, nama, matkul, waktu_kehadiran) VALUES('$npm','$nama','$matkul', 
    NOW())");
}

?>

<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Judul halaman -->
    <title>Daftar absen</title>
</head>

<body>
    <!-- Navbar menggunakan Bootstrap -->
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">Daftar absen</span>
        </div>
    </nav>

    <!-- Bagian utama halaman -->
    <div class="bg-success p-2 text-dark bg-opacity-10">
        <h1 class="p-4 text-center">DAFTAR HADIR MAHASISWA</h1>
        <div class="container">
            <!-- Formulir untuk input data mahasiswa -->
            <form action="" method="post" name="form_absen">
                <div class="col-md-6 offset-md-3">
                    <!-- Input untuk NPM -->
                    <div class="mb-3">
                        <label class="form-label">NPM</label>
                        <input type="number" class="form-control" name="npm" placeholder="Masukkan NPM" required>
                    </div>
                    <!-- Input untuk nama -->
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama" required>
                    </div>
                    <!-- Input untuk mata kuliah -->
                    <div class="mb-3">
                        <label class="form-label">Mata Kuliah</label>
                        <input type="text" class="form-control" name="matkul" placeholder="Masukkan Mata Kuliah" required>
                    </div>
                </div>
                <!-- Tombol untuk reset dan submit -->
                <div class="text-center">
                    <button type="reset" class="btn btn-danger" name="Reset">Reset</button>
                    <button type="submit" class="btn btn-primary" name="Submit">Hadir</button>
                </div>
            </form>

            <!-- Tabel untuk menampilkan data mahasiswa -->
            <table class="my-5 table table-striped">
                <tr class="table-dark">
                    <th>NPM</th>
                    <th>Nama</th>
                    <th>Mata Kuliah</th>
                    <th>Waktu Kehadiran</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>

                <?php
                while ($r = mysqli_fetch_array($result)) {
                ?>
                    <tr class="table-primary">
                        <td><?php echo $r['npm']; ?></td>
                        <td><?php echo $r['nama']; ?></td>
                        <td><?php echo $r['matkul']; ?></td>
                        <td><?php echo $r['waktu_kehadiran']; ?></td>
                        <!-- Tombol Edit dan Delete dengan link ke halaman terkait -->
                        <td><a href="edit.php?id=<?php echo $r['id']; ?>" class="btn btn-warning">Edit</a></td>
                        <td><a href="delete.php?id=<?php echo $r['id']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Delete</a></td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </div>

    <!-- Mengimpor script JavaScript dari Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>
