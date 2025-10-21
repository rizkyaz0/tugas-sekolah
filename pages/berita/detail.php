<?php
require_once __DIR__ . '/../../includes/db.php';
require_once __DIR__ . '/../../includes/functions.php';
require_once __DIR__ . '/../../includes/config.php';

$slug = $_GET['slug'] ?? '';
if (!$slug && isset($ROUTE['sub'])) { $slug = $ROUTE['sub']; }

$pdo = getPDO();
$stmt = $pdo->prepare('SELECT id, title, slug, image_path, created_at, body FROM posts WHERE slug = :slug LIMIT 1');
$stmt->execute([':slug' => $slug]);
$post = $stmt->fetch();
?>
<div class="container py-5">
  <?php if (!$post): ?>
    <div class="alert alert-warning">Berita tidak ditemukan.</div>
  <?php else: ?>
    <article class="mx-auto" style="max-width: 820px;">
      <h2 class="mb-1"><?= esc($post['title']) ?></h2>
      <div class="text-muted small mb-3">Dipublikasikan pada <?= esc(indo_date($post['created_at'])) ?></div>
      <?php if (!empty($post['image_path'])): ?>
        <img src="<?= esc(base_url(UPLOADS_URL . '/posts/' . $post['image_path'])) ?>" class="img-fluid rounded mb-3" alt="<?= esc($post['title']) ?>">
      <?php endif; ?>
      <div class="content">
        <?= $post['body'] /* body is trusted admin input; ensure proper sanitization in admin */ ?>
      </div>
    </article>
  <?php endif; ?>
</div>
