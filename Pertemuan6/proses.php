<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $maskapai = $_POST["maskapai"];
    $asal = $_POST["asal"];
    $tujuan = $_POST["tujuan"];
    $harga = $_POST["harga"];

    echo "<h2>Data Penerbangan</h2>";
    echo "Maskapai: $maskapai<br>";
    echo "Asal: $asal<br>";
    echo "Tujuan: $tujuan<br>";
    echo "Harga Tiket: Rp " . number_format($harga, 0, ',', '.');
} else {
    echo "Metode tidak diizinkan.";
}
?>
