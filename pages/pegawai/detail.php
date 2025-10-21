<?php
require_once __DIR__ . '/../../includes/db.php';
require_once __DIR__ . '/../../includes/functions.php';
require_once __DIR__ . '/../../includes/config.php';

$slug = $_GET['slug'] ?? ($ROUTE['sub'] ?? '');
$pdo = getPDO();
$stmt = $pdo->prepare('SELECT id, name, position, bio, photo_path FROM employees WHERE slug = :slug LIMIT 1');
$stmt->execute([':slug' => $slug]);
$emp = $stmt->fetch();
?>
<div class="container py-5">
  <?php if (!$emp): ?>
    <div class="alert alert-warning">Profil pegawai tidak ditemukan.</div>
  <?php else: ?>
    <div class="row g-4">
      <div class="col-md-4">
        <?php if (!empty($emp['photo_path'])): ?>
          <img src="<?= esc(base_url(UPLOADS_URL . '/employees/' . $emp['photo_path'])) ?>" class="img-fluid rounded" alt="<?= esc($emp['name']) ?>">
        <?php endif; ?>
      </div>
      <div class="col-md-8">
        <h3 class="mb-1"><?= esc($emp['name']) ?></h3>
        <div class="text-muted mb-3"><?= esc($emp['position']) ?></div>
        <div><?= $emp['bio'] ?></div>
      </div>
    </div>
  <?php endif; ?>
</div>
