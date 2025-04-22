<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Sistem Akademik</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
  <style>
    body {
      display: flex;
      min-height: 100vh;
      margin: 0;
    }
    .sidebar {
      width: 250px;
      background-color: #198754; /* hijau Bootstrap */
      color: white;
    }
    .sidebar a.nav-link {
      color: white;
      font-weight: 500;
    }
    .sidebar a.nav-link:hover {
      background-color: #157347;
      color: #fff;
    }
    .sidebar .navbar-brand {
      font-size: 1.3rem;
      font-weight: bold;
      margin-bottom: 30px;
    }
    .content {
      flex-grow: 1;
      padding: 20px;
      background-color: #f8f9fa;
    }
  </style>
</head>
<body>

  <nav class="sidebar d-flex flex-column p-3">
    <a class="navbar-brand text-white" href="#"><i class="bi bi-mortarboard-fill me-2"></i>Sistem Akademik</a>
    <ul class="nav nav-pills flex-column">
      <li class="nav-item mb-2">
        <a class="nav-link" href="mahasiswa.php"><i class="bi bi-person-fill me-2"></i>Mahasiswa</a>
      </li>
      <li class="nav-item mb-2">
        <a class="nav-link" href="matakuliah.php"><i class="bi bi-journal-bookmark-fill me-2"></i>Mata Kuliah</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="krs.php"><i class="bi bi-card-list me-2"></i>KRS</a>
      </li>
    </ul>
  </nav>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
