<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/functions.php';
if (!isset($_SESSION['admin_logged_in'])) { header('Location: login.php'); exit; }

$pdo = getPDO();
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$title = $body = $image_path = '';

if ($id) {
  $stmt = $pdo->prepare('SELECT * FROM posts WHERE id = :id');
  $stmt->execute([':id'=>$id]);
  if ($row = $stmt->fetch()) {
    $title = $row['title'];
    $body = $row['body'];
    $image_path = $row['image_path'];
  }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $title = trim($_POST['title'] ?? '');
  $body = $_POST['body'] ?? '';
  $slug = slugify($title);

  // upload image
  if (!empty($_FILES['image']['name'])) {
    $fn = time() . '-' . preg_replace('/[^A-Za-z0-9._-]/','_', $_FILES['image']['name']);
    $dest = UPLOADS_DIR . '/posts/' . $fn;
    if (is_uploaded_file($_FILES['image']['tmp_name'])) {
      move_uploaded_file($_FILES['image']['tmp_name'], $dest);
      $image_path = $fn;
    }
  }

  if ($id) {
    $stmt = $pdo->prepare('UPDATE posts SET title=:t, slug=:s, body=:b, image_path=:i WHERE id=:id');
    $stmt->execute([':t'=>$title, ':s'=>$slug, ':b'=>$body, ':i'=>$image_path, ':id'=>$id]);
  } else {
    $stmt = $pdo->prepare('INSERT INTO posts (title, slug, body, image_path, created_at) VALUES (:t,:s,:b,:i,NOW())');
    $stmt->execute([':t'=>$title, ':s'=>$slug, ':b'=>$body, ':i'=>$image_path]);
    $id = (int)$pdo->lastInsertId();
  }
  header('Location: posts.php');
  exit;
}
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $id? 'Edit':'Tambah' ?> Berita</title>
  <link rel="stylesheet" href="<?= esc(base_url('assets/libs/bootstrap/dist/css/bootstrap.min.css')) ?>">
</head>
<body>
<div class="container py-4" style="max-width:860px;">
  <a class="btn btn-link" href="posts.php">&larr; Kembali</a>
  <h4 class="mb-3"><?= $id? 'Edit':'Tambah' ?> Berita</h4>
  <form method="post" enctype="multipart/form-data">
    <div class="mb-3">
      <label class="form-label">Judul</label>
      <input class="form-control" name="title" value="<?= esc($title) ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Gambar Sampul</label>
      <input type="file" class="form-control" name="image" accept="image/*">
      <?php if ($image_path): ?><img src="<?= esc(base_url(UPLOADS_URL . '/posts/' . $image_path)) ?>" class="img-fluid mt-2" style="max-height:160px;" alt="cover"><?php endif; ?>
    </div>
    <div class="mb-3">
      <label class="form-label">Konten</label>
      <textarea class="form-control" name="body" rows="12" required><?= esc($body) ?></textarea>
    </div>
    <button class="btn btn-primary">Simpan</button>
  </form>
</div>
<script src="<?= esc(base_url('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')) ?>"></script>
</body>
</html>
