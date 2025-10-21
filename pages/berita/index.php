<?php
require_once __DIR__ . '/../../includes/db.php';
require_once __DIR__ . '/../../includes/functions.php';
require_once __DIR__ . '/../../includes/config.php';

$pdo = getPDO();
$limit = 9;
$page = max(1, (int)($_GET['p'] ?? 1));
$offset = ($page - 1) * $limit;
$total = (int)$pdo->query('SELECT COUNT(*) FROM posts')->fetchColumn();
$stmt = $pdo->prepare('SELECT id, title, slug, image_path, created_at, body FROM posts ORDER BY created_at DESC LIMIT :l OFFSET :o');
$stmt->bindValue(':l', $limit, PDO::PARAM_INT);
$stmt->bindValue(':o', $offset, PDO::PARAM_INT);
try { $stmt->execute(); $posts = $stmt->fetchAll(); } catch (Throwable $e) { $posts = []; }
$pages = max(1, (int)ceil($total / $limit));
?>
<div class="container py-5">
  <h3 class="mb-4">Berita</h3>
  <div class="row g-3">
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
    <?php if (empty($posts)): ?>
      <div class="col-12"><div class="alert alert-light border">Belum ada berita.</div></div>
    <?php endif; ?>
  </div>
  <?php if ($pages > 1): ?>
  <nav class="mt-4">
    <ul class="pagination">
      <?php for ($i=1; $i <= $pages; $i++): ?>
        <li class="page-item <?= $i===$page ? 'active' : '' ?>">
          <a class="page-link" href="<?= esc(base_url('?url=berita&p='.$i)) ?>"><?= $i ?></a>
        </li>
      <?php endfor; ?>
    </ul>
  </nav>
  <?php endif; ?>
</div>
