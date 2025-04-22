<?php include 'koneksi.php'; ?>
<?php include 'index.php'; ?>

<?php
    // Proses penyimpanan data mahasiswa
    if (isset($_POST['create'])) {
        $npm = $_POST['npm'];
        $nama = $_POST['nama'];
        $jurusan = $_POST['jurusan'];
        $alamat = $_POST['alamat'];

        $query = "INSERT INTO mahasiswa (npm, nama, jurusan, alamat) 
                  VALUES ('$npm', '$nama', '$jurusan', '$alamat')";
        if (mysqli_query($koneksi, $query)) {
            echo '<div class="alert alert-success mt-3">Data berhasil ditambah!</div>';
        } else {
            echo '<div class="alert alert-danger mt-3">Gagal menambahkan data: ' . mysqli_error($koneksi) . '</div>';
        }
    }
    ?>
    
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-4">
    <h2>Tambah Mahasiswa</h2>
    <!-- Form tambah mahasiswa -->
    <form method="POST" class="bg-white p-4 border rounded shadow-sm">
        <div class="mb-3">
            <label>NPM</label>
            <input type="text" name="npm" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Jurusan</label>
            <select name="jurusan" class="form-select" required>
                <option value="">-- Pilih Jurusan --</option>
                <option value="Teknik Informatika">Teknik Informatika</option>
                <option value="Sistem Operasi">Sistem Operasi</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" required>
        </div>
        <button type="submit" name="create" class="btn btn-primary" style="background-color:blue; border-color:blue;">Simpan</button>
        <a href="mahasiswa.php" class="btn btn-info">Kembali</a>
    </form>
</div>
</body>
</html>
