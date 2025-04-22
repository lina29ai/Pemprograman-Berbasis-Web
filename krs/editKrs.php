<?php include 'index.php'; ?>
<?php include 'koneksi.php'; ?>

<?php
// Ambil data berdasarkan ID KRS
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($koneksi, "SELECT * FROM krs WHERE id='$id'");
    $data = mysqli_fetch_assoc($result);
} else {
    echo '<div class="alert alert-danger">ID KRS tidak ditemukan.</div>';
    exit;
}

// Proses update data
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $npm = $_POST['npm'];
    $kodemk = $_POST['kodemk'];

    $query = "UPDATE krs SET mahasiswa_npm='$npm', matakuliah_kodemk='$kodemk' WHERE id='$id'";
    if (mysqli_query($koneksi, $query)) {
        echo '<div class="alert alert-success mt-3">Data KRS berhasil diupdate!</div>';
    } else {
        echo '<div class="alert alert-danger mt-3">Gagal mengupdate data: ' . mysqli_error($koneksi) . '</div>';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit KRS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-4">
    <h2>Edit KRS</h2>
    <form method="POST" class="bg-white p-4 border rounded shadow-sm">
        <input type="hidden" name="id" value="<?= $data['id'] ?>">
        <div class="mb-3">
            <label>Mahasiswa</label>
            <select name="npm" class="form-select" required>
                <option value="">-- Pilih Mahasiswa --</option>
                <?php
                $mhs = mysqli_query($koneksi, "SELECT * FROM mahasiswa");
                while ($row = mysqli_fetch_assoc($mhs)) {
                    $selected = ($row['npm'] == $data['mahasiswa_npm']) ? 'selected' : '';
                    echo "<option value='{$row['npm']}' $selected>{$row['nama']}</option>";
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
                    $selected = ($row['kodemk'] == $data['matakuliah_kodemk']) ? 'selected' : '';
                    echo "<option value='{$row['kodemk']}' $selected>{$row['nama']}</option>";
                }
                ?>
            </select>
        </div>
        <button type="submit" name="update" class="btn btn-success">Update</button>
        <a href="krs.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
