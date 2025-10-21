<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/functions.php';

if (!isset($_SESSION['admin_logged_in'])) { header('Location: login.php'); exit; }
$pdo = getPDO();

// Delete
if (isset($_POST['delete_id'])) {
  $id = (int)$_POST['delete_id'];
  $pdo->prepare('DELETE FROM posts WHERE id = :id')->execute([':id' => $id]);
}

$posts = $pdo->query('SELECT id, title, slug, created_at FROM posts ORDER BY created_at DESC')->fetchAll();
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Berita - Admin</title>
  <link rel="stylesheet" href="<?= esc(base_url('assets/libs/bootstrap/dist/css/bootstrap.min.css')) ?>">
</head>
<body>
<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="mb-0">Berita</h5>
    <div>
      <a class="btn btn-secondary" href="index.php">Dashboard</a>
      <a class="btn btn-primary" href="post-edit.php">Tambah</a>
    </div>
  </div>
  <div class="table-responsive">
    <table class="table table-striped align-middle">
      <thead><tr><th>Judul</th><th>Tanggal</th><th style="width:160px"></th></tr></thead>
      <tbody>
        <?php foreach ($posts as $p): ?>
        <tr>
          <td><?= esc($p['title']) ?></td>
          <td class="small text-muted"><?= esc(indo_date($p['created_at'])) ?></td>
          <td class="text-end">
            <a class="btn btn-sm btn-outline-primary" href="post-edit.php?id=<?= $p['id'] ?>">Edit</a>
            <form method="post" class="d-inline" onsubmit="return confirm('Hapus berita ini?')">
              <input type="hidden" name="delete_id" value="<?= $p['id'] ?>">
              <button class="btn btn-sm btn-outline-danger">Hapus</button>
            </form>
          </td>
        </tr>
        <?php endforeach; ?>
        <?php if (empty($posts)): ?><tr><td colspan="3">Belum ada berita.</td></tr><?php endif; ?>
      </tbody>
    </table>
  </div>
</div>
<script src="<?= esc(base_url('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')) ?>"></script>
</body>
</html>
