<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/functions.php';

if (!isset($_SESSION['admin_logged_in'])) {
  header('Location: login.php');
  exit;
}
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin - <?= esc($SITE['short_name']) ?></title>
  <link rel="stylesheet" href="<?= esc(base_url('assets/libs/bootstrap/dist/css/bootstrap.min.css')) ?>">
</head>
<body>
<nav class="navbar navbar-expand navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="#">Admin <?= esc($SITE['short_name']) ?></a>
    <div class="ms-auto"><a class="btn btn-sm btn-outline-light" href="logout.php">Logout</a></div>
  </div>
</nav>
<div class="container py-4">
  <div class="row g-3">
    <div class="col-md-6">
      <div class="card h-100">
        <div class="card-body">
          <h5 class="card-title">Kelola Berita</h5>
          <p class="card-text">Tambah, ubah, hapus berita website.</p>
          <a href="posts.php" class="btn btn-primary">Masuk</a>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card h-100">
        <div class="card-body">
          <h5 class="card-title">Kelola Pegawai</h5>
          <p class="card-text">Kelola data profil pegawai.</p>
          <a href="employees.php" class="btn btn-primary">Masuk</a>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="<?= esc(base_url('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')) ?>"></script>
</body>
</html>
