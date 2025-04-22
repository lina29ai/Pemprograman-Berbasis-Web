<?php include 'index.php'; ?>
<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-beige">
<div class="container mt-4">
    <h2>Data Mahasiswa</h2>
    
    <a href="tambahMahasiswa.php" class="btn btn-primary mb-3" style="background-color:gray; border-color:gray; width:200px;">Tambah Mahasiswa</a>
    
    <table class="table table-bordered">
        <thead class="table-secondary">
            <tr>
                <th>NPM</th>
                <th>Nama</th>
                <th>Jurusan</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        
        </tbody>
        <tbody>
            <?php
            $result = mysqli_query($koneksi, "SELECT * FROM mahasiswa");
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$row['npm']}</td>
                        <td>{$row['nama']}</td>
                        <td>{$row['jurusan']}</td>
                        <td>{$row['alamat']}</td>
                        <td>
                            <a href='editMahasiswa.php?npm={$row['npm']}' class='btn btn-primary btn-sm'>Edit</a>
                            <a href='hapusMahasiswa.php?npm={$row['npm']}' class='btn btn-info btn-sm' onclick='return confirm(\"Hapus data ini?\")'>Hapus</a>
                        </td>
                    </tr>";
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>
