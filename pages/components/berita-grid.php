<?php
require_once __DIR__ . '/../../includes/db.php';
require_once __DIR__ . '/../../includes/functions.php';

$pdo = getPDO();
$stmt = $pdo->prepare("SELECT id, title, slug, image_path, created_at, body FROM posts ORDER BY created_at DESC LIMIT 3");
try { $stmt->execute(); $posts = $stmt->fetchAll(); } catch (Throwable $e) { $posts = []; }
?>
<div class="row g-3">
<?php if (empty($posts)): ?>
  <div class="col-12">
    <div class="alert alert-light border">Belum ada berita. Admin dapat menambahkan melalui halaman admin.</div>
  </div>
<?php else: ?>
  <?php foreach ($posts as $post): ?>
    <div class="col-md-6 col-lg-4">
      <a href="<?= esc(base_url('?url=berita/detail/' . urlencode($post['slug']))) ?>" class="text-decoration-none text-dark">
        <div class="card h-100 shadow-sm">
          <?php if (!empty($post['image_path'])): ?>
            <img src="<?= esc(base_url(UPLOADS_URL . '/posts/' . $post['image_path'])) ?>" class="card-img-top" alt="<?= esc($post['title']) ?>">
          <?php endif; ?>
          <div class="card-body">
            <h6 class="mb-1"><?= esc($post['title']) ?></h6>
            <div class="small text-muted mb-2"><?= esc(indo_date($post['created_at'])) ?></div>
            <p class="small text-muted mb-0"><?= esc(excerpt($post['body'])) ?></p>
          </div>
        </div>
      </a>
    </div>
  <?php endforeach; ?>
<?php endif; ?>
</div>
