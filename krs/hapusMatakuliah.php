<?php include 'koneksi.php'; ?>
<?php include 'index.php'; ?>

<?php 
// Cek apakah ada parameter kodemk yang diterima
if (isset($_GET['kodemk'])) {
    $kodemk = $_GET['kodemk'];

    // Hapus data di tabel krs yang terkait dengan kodemk
    $query_krs = "DELETE FROM krs WHERE matakuliah_kodemk='$kodemk'";
    mysqli_query($koneksi, $query_krs);

    // Hapus data di tabel matakuliah
    $query_mk = "DELETE FROM matakuliah WHERE kodemk='$kodemk'";

    // Eksekusi query penghapusan matakuliah
    if (mysqli_query($koneksi, $query_mk)) {
        echo '<div class="alert alert-success">Data berhasil dihapus!</div>';
    } else {
        echo '<div class="alert alert-danger">Gagal menghapus data: ' . mysqli_error($koneksi) . '</div>';
    }

    // Redirect kembali ke halaman daftar matakuliah setelah 2 detik
    header("Refresh: 2; url=matakuliah.php");
    exit();
} else {
    echo '<div class="alert alert-danger">Kode matakuliah tidak ditemukan.</div>';
    exit();
}
?>
