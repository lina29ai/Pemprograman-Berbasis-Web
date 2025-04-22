<?php include 'index.php'; ?>
<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Data KRS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-4">
    <h2>Data KRS</h2>
    
    <a href="tambahKrs.php" class="btn btn-primary mb-3" style="background-color:grayc; border-color:gray; width:200px;">Tambah KRS</a>
    
    <table class="table table-bordered table-striped">
        <thead class="table-secondary">
            <tr>
                <th>No</th>
                <th>Nama Mahasiswa</th>
                <th>Mata Kuliah</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result = mysqli_query($koneksi, "SELECT k.id, m.nama AS mahasiswa, mk.nama AS matakuliah, mk.jumlah_sks
                                              FROM krs k
                                              JOIN mahasiswa m ON k.mahasiswa_npm = m.npm
                                              JOIN matakuliah mk ON k.matakuliah_kodemk = mk.kodemk
                                              ORDER BY k.id ASC");
            $no = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$no}</td>
                        <td>{$row['mahasiswa']}</td>
                        <td>{$row['matakuliah']}</td>
                        <td><strong class='text-info'>{$row['mahasiswa']}</strong> Mengambil Mata Kuliah <span class='text-success fw-semibold'>{$row['matakuliah']}</span> ({$row['jumlah_sks']} SKS)</td>
                        <td>
                            <a href='editKrs.php?id={$row['id']}' class='btn btn-sm btn-primary'>Edit</a>
                            <a href='hapusKrs.php?id={$row['id']}' class='btn btn-sm btn-info' onclick='return confirm(\"Yakin hapus data ini?\")'>Hapus</a>
                        </td>
                    </tr>";
                $no++;
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>
