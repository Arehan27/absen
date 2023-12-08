<?php
include_once("koneksi.php");

// Memeriksa apakah terdapat parameter id yang dikirim melalui URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Mengambil data mahasiswa berdasarkan id
    $result_edit = mysqli_query($mysqli, "SELECT * FROM absen WHERE id=$id");

    // Mendapatkan data dalam bentuk array
    $data = mysqli_fetch_array($result_edit);
}
?>

<!-- HTML dan CSS -->

<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Judul halaman -->
    <title>Edit Data</title>
</head>
<body>
    <div class="bg-success p-2 text-dark bg-opacity-10">
        <h1 class="p-4 text-center">EDIT DATA MAHASISWA</h1>
        <div class="container">
            <!-- Formulir Edit Data -->
            <form action="update.php" method="post" name="form_edit">
                <!-- Menyimpan data ID sebagai input tersembunyi -->
                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                <!-- Input untuk NPM -->
                <div class="mb-3">
                    <label class="form-label">NPM</label>
                    <input type="number" class="form-control" name="npm" value="<?php echo $data['npm']; ?>" required>
                </div>
                <!-- Input untuk nama -->
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" class="form-control" name="nama" value="<?php echo $data['nama']; ?>" required>
                </div>
                <!-- Input untuk mata kuliah -->
                <div class="mb-3">
                    <label class="form-label">Mata Kuliah</label>
                    <input type="text" class="form-control" name="matkul" value="<?php echo $data['matkul']; ?>" required>
                </div>
                <!-- Tombol untuk submit perubahan -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary" name="Update">Update</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Mengimpor script JavaScript dari Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
