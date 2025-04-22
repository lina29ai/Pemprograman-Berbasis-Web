<?php include 'index.php'; ?>
<?php include 'koneksi.php'; ?>

<?php
if (isset($_POST['create'])) {
    $npm = $_POST['npm'];
    $kodemk = $_POST['kodemk'];

    $query = "INSERT INTO krs (mahasiswa_npm, matakuliah_kodemk) VALUES ('$npm', '$kodemk')";
    if (mysqli_query($koneksi, $query)) {
        echo '<div class="alert alert-success mt-3">Data KRS berhasil ditambahkan!</div>';
    } else {
        echo '<div class="alert alert-danger mt-3">Gagal menambahkan data: ' . mysqli_error($koneksi) . '</div>';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah KRS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-4">
    <h2>Tambah KRS</h2>
    <form method="POST" class="bg-white p-4 border rounded shadow-sm">
        <div class="mb-3">
            <label>Mahasiswa</label>
            <select name="npm" class="form-select" required>
                <option value="">-- Pilih Mahasiswa --</option>
                <?php
                $mhs = mysqli_query($koneksi, "SELECT * FROM mahasiswa");
                while ($row = mysqli_fetch_assoc($mhs)) {
                    echo "<option value='{$row['npm']}'>{$row['nama']}</option>";
                }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label>Mata Kuliah</label>
            <select name="kodemk" class="form-select" required>
                <option value="">-- Pilih Mata Kuliah --</option>
                <?php
                $mk = mysqli_query($koneksi, "SELECT * FROM matakuliah");
                while ($row = mysqli_fetch_assoc($mk)) {
                    echo "<option value='{$row['kodemk']}'>{$row['nama']}</option>";
                }
                ?>
            </select>
        </div>
        <button type="submit" name="create" class="btn btn-primary" style="background-color:blue; border-color:blue;">Simpan</button>
        <a href="krs.php" class="btn btn-info">Kembali</a>
    </form>
</div>
</body>
</html>
