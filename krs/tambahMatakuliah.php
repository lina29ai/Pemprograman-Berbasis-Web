<?php include 'koneksi.php'; ?>
<?php include 'index.php'; ?>

<?php
// Proses penyimpanan data matakuliah
if (isset($_POST['create'])) {
    $kodemk = $_POST['kode'];
    $nama = $_POST['nama'];
    $sks = $_POST['sks'];

    $query = "INSERT INTO matakuliah (kodemk, nama, jumlah_sks) 
              VALUES ('$kodemk', '$nama', '$sks')";
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
    <title>Tambah Mata Kuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-4">
    <h2>Tambah Mata Kuliah</h2>
    <!-- Form tambah mata kuliah -->
    <form method="POST" class="bg-white p-4 border rounded shadow-sm">
        <div class="mb-3">
            <label>Kode MK</label>
            <input type="text" name="kode" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Nama Mata Kuliah</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Jumlah SKS</label>
            <input type="number" name="sks" class="form-control" required>
        </div>
        <button type="submit" name="create" class="btn btn-primary" style="background-color:blue; border-color:blue;">Simpan</button>
        <a href="matakuliah.php" class="btn btn-info">Kembali</a>
    </form>
</div>
</body>
</html>
