<?php include 'koneksi.php'; ?>
<?php include 'index.php'; ?>

<?php
// Cek apakah ada parameter kodemk yang diterima
if (isset($_GET['kodemk'])) {
    $kodemk = $_GET['kodemk'];

    // Ambil data matakuliah berdasarkan kodemk
    $result = mysqli_query($koneksi, "SELECT * FROM matakuliah WHERE kodemk = '$kodemk'");
    $row = mysqli_fetch_assoc($result);

    if (!$row) {
        echo '<div class="alert alert-danger">Data matakuliah tidak ditemukan.</div>';
        exit();
    }
} else {
    echo '<div class="alert alert-danger">Kode matakuliah tidak ditemukan.</div>';
    exit();
}

// Proses update
if (isset($_POST['update'])) {
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $sks  = $_POST['sks'];

    $updateQuery = "UPDATE matakuliah SET nama = '$nama', jumlah_sks = '$sks' WHERE kodemk = '$kode'";
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
    <title>Edit Matakuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-4">
    <h2>Edit Matakuliah</h2>
    <form method="POST" class="bg-white p-4 border rounded shadow-sm">
        <div class="mb-3">
            <label>Kode</label>
            <input type="text" name="kode" class="form-control" value="<?php echo $row['kodemk']; ?>" readonly>
        </div>
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="<?php echo $row['nama']; ?>" required>
        </div>
        <div class="mb-3">
            <label>Jumlah SKS</label>
            <input type="number" name="sks" class="form-control" value="<?php echo $row['jumlah_sks']; ?>" required>
        </div>
        <button type="submit" name="update" class="btn btn-primary" style="background-color:blue; border-color:blue;">Update</button>
        <a href="matakuliah.php" class="btn btn-info">Kembali</a>
    </form>
</div>
</body>
</html>
