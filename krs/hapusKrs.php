<?php include 'koneksi.php'; ?>
<?php include 'index.php'; ?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM krs WHERE id='$id'";
    if (mysqli_query($koneksi, $query)) {
        echo '<div class="alert alert-success mt-3">Data berhasil dihapus!</div>';
    } else {
        echo '<div class="alert alert-danger mt-3">Gagal menghapus data: ' . mysqli_error($koneksi) . '</div>';
    }

    // Redirect kembali ke halaman KRS
    header("Refresh: 2; url=krs.php");
    exit;
} else {
    echo '<div class="alert alert-danger">ID KRS tidak ditemukan.</div>';
    exit;
}
?>
