<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/functions.php';
if (!isset($_SESSION['admin_logged_in'])) { header('Location: login.php'); exit; }

$pdo = getPDO();
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$name = $position = $bio = $photo_path = '';

if ($id) {
  $stmt = $pdo->prepare('SELECT * FROM employees WHERE id = :id');
  $stmt->execute([':id'=>$id]);
  if ($row = $stmt->fetch()) {
    $name = $row['name'];
    $position = $row['position'];
    $bio = $row['bio'];
    $photo_path = $row['photo_path'];
  }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = trim($_POST['name'] ?? '');
  $position = trim($_POST['position'] ?? '');
  $bio = $_POST['bio'] ?? '';
  $slug = slugify($name);
  
  if (!empty($_FILES['photo']['name'])) {
    $fn = time() . '-' . preg_replace('/[^A-Za-z0-9._-]/','_', $_FILES['photo']['name']);
    $dest = UPLOADS_DIR . '/employees/' . $fn;
    if (is_uploaded_file($_FILES['photo']['tmp_name'])) {
      move_uploaded_file($_FILES['photo']['tmp_name'], $dest);
      $photo_path = $fn;
    }
  }

  if ($id) {
    $stmt = $pdo->prepare('UPDATE employees SET name=:n, slug=:s, position=:p, bio=:b, photo_path=:ph WHERE id=:id');
    $stmt->execute([':n'=>$name, ':s'=>$slug, ':p'=>$position, ':b'=>$bio, ':ph'=>$photo_path, ':id'=>$id]);
  } else {
    $stmt = $pdo->prepare('INSERT INTO employees (name, slug, position, bio, photo_path) VALUES (:n,:s,:p,:b,:ph)');
    $stmt->execute([':n'=>$name, ':s'=>$slug, ':p'=>$position, ':b'=>$bio, ':ph'=>$photo_path]);
    $id = (int)$pdo->lastInsertId();
  }
  header('Location: employees.php');
  exit;
}
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $id? 'Edit':'Tambah' ?> Pegawai</title>
  <link rel="stylesheet" href="<?= esc(base_url('assets/libs/bootstrap/dist/css/bootstrap.min.css')) ?>">
</head>
<body>
<div class="container py-4" style="max-width:860px;">
  <a class="btn btn-link" href="employees.php">&larr; Kembali</a>
  <h4 class="mb-3"><?= $id? 'Edit':'Tambah' ?> Pegawai</h4>
  <form method="post" enctype="multipart/form-data">
    <div class="mb-3">
      <label class="form-label">Nama</label>
      <input class="form-control" name="name" value="<?= esc($name) ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Jabatan</label>
      <input class="form-control" name="position" value="<?= esc($position) ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Foto</label>
      <input type="file" class="form-control" name="photo" accept="image/*">
      <?php if ($photo_path): ?><img src="<?= esc(base_url(UPLOADS_URL . '/employees/' . $photo_path)) ?>" class="img-fluid mt-2" style="max-height:160px;" alt="foto"><?php endif; ?>
    </div>
    <div class="mb-3">
      <label class="form-label">Bio/Profil Singkat</label>
      <textarea class="form-control" name="bio" rows="10"><?= esc($bio) ?></textarea>
    </div>
    <button class="btn btn-primary">Simpan</button>
  </form>
</div>
<script src="<?= esc(base_url('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')) ?>"></script>
</body>
</html>
