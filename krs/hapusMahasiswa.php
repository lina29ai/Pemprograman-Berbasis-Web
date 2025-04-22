<?php include 'koneksi.php'; ?>
<?php include 'index.php'; ?>

<?php 
// Cek apakah ada parameter npm yang diterima
if (isset($_GET['npm'])) {
    $npm = $_GET['npm'];

    // Hapus data di tabel krs yang terkait dengan npm
    $query_krs = "DELETE FROM krs WHERE mahasiswa_npm='$npm'";
    mysqli_query($koneksi, $query_krs);

    // Hapus data di tabel mahasiswa
    $query_mahasiswa = "DELETE FROM mahasiswa WHERE npm='$npm'";

    // Eksekusi query penghapusan mahasiswa
    if (mysqli_query($koneksi, $query_mahasiswa)) {
        echo '<div class="alert alert-success">Data berhasil dihapus!</div>';
    } else {
        echo '<div class="alert alert-danger">Gagal menghapus data: ' . mysqli_error($koneksi) . '</div>';
    }

    // Redirect kembali ke halaman daftar mahasiswa setelah 2 detik
    header("Refresh: 2; url=mahasiswa.php");
    exit();
} else {
    echo '<div class="alert alert-danger">NPM tidak ditemukan.</div>';
    exit();
}
?>
