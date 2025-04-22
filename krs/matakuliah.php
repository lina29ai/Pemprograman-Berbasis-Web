<?php include 'index.php'; ?>
<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Mata Kuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-4">
    <h2>Data Mata Kuliah</h2>
    
    <a href="tambahMatakuliah.php" class="btn btn-primary mb-3" style="background-color:gray; border-color:gray; width:200px;">Tambah Mata Kuliah</a>

    <table class="table table-bordered">
        <thead class="table-secondary">
            <tr>
                <th>Kode</th>
                <th>Nama</th>
                <th>SKS</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result = mysqli_query($koneksi, "SELECT * FROM matakuliah");
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$row['kodemk']}</td>
                        <td>{$row['nama']}</td>
                        <td>{$row['jumlah_sks']}</td>
                        <td>
                            <a href='editMatakuliah.php?kodemk={$row['kodemk']}' class='btn btn-primary btn-sm'>Edit</a>
                            <a href='hapusMatakuliah.php?kodemk={$row['kodemk']}' class='btn btn-info btn-sm' onclick='return confirm(\"Hapus data ini?\")'>Hapus</a>
                        </td>
                    </tr>";
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>
