<?php include 'koneksi.php'; ?>
<?php include 'index.php'; ?>

<?php
// Cek apakah ada parameter npm yang diterima
if (isset($_GET['npm'])) {
    $npm = $_GET['npm'];

    // Ambil data mahasiswa berdasarkan npm
    $result = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE npm = '$npm'");
    $row = mysqli_fetch_assoc($result);

    // Cek apakah data ditemukan
    if (!$row) {
        echo '<div class="alert alert-danger">Data mahasiswa tidak ditemukan.</div>';
        exit();
    }
} else {
    echo '<div class="alert alert-danger">NPM tidak ditemukan.</div>';
    exit();
}

if (isset($_POST['update'])) {
    // Proses update data
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];

    // Update data mahasiswa
    $updateQuery = "UPDATE mahasiswa SET nama = '$nama', jurusan = '$jurusan', alamat = '$alamat' WHERE npm = '$npm'";
    if (mysqli_query($koneksi, $updateQuery)) {
        echo '<div class="alert alert-success">Data berhasil diperbarui!</div>';
    } else {
        echo '<div class="alert alert-danger">Gagal memperbarui data: ' . mysqli_error($koneksi) . '</div>';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-4">
    <h2>Edit Mahasiswa</h2>
    <form method="POST" class="bg-white p-4 border rounded shadow-sm">
        <div class="mb-3">
            <label>NPM</label>
            <input type="text" name="npm" class="form-control" value="<?php echo $row['npm']; ?>" readonly>
        </div>
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="<?php echo $row['nama']; ?>" required>
        </div>
        <div class="mb-3">
            <label>Jurusan</label>
            <select name="jurusan" class="form-select" required>
                <option value="">-- Pilih Jurusan --</option>
                <option value="Teknik Informatika" <?php if ($row['jurusan'] == 'Teknik Informatika') echo 'selected'; ?>>Teknik Informatika</option>
                <option value="Sistem Operasi" <?php if ($row['jurusan'] == 'Sistem Operasi') echo 'selected'; ?>>Sistem Operasi</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" value="<?php echo $row['alamat']; ?>" required>
        </div>
        <button type="submit" name="update" class="btn btn-primary" style="background-color:blue; border-color:blue;">Update</button>
        <a href="mahasiswa.php" class="btn btn-info">Kembali</a>
    </form>
</div>
</body>
</html>
