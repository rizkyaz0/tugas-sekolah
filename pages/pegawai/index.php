<?php
require_once __DIR__ . '/../../includes/db.php';
require_once __DIR__ . '/../../includes/functions.php';
require_once __DIR__ . '/../../includes/config.php';

$pdo = getPDO();
$stmt = $pdo->prepare('SELECT id, name, position, photo_path, slug FROM employees ORDER BY name ASC');
try { $stmt->execute(); $employees = $stmt->fetchAll(); } catch (Throwable $e) { $employees = []; }
?>
<div class="container py-5">
  <h3 class="mb-4">Profil Pegawai</h3>
  <div class="row g-3">
    <?php foreach ($employees as $emp): ?>
      <div class="col-6 col-md-4 col-lg-3">
        <a href="<?= esc(base_url('?url=pegawai/detail/' . urlencode($emp['slug']))) ?>" class="text-decoration-none text-dark">
          <div class="card h-100 shadow-sm text-center">
            <?php if (!empty($emp['photo_path'])): ?>
              <img src="<?= esc(base_url(UPLOADS_URL . '/employees/' . $emp['photo_path'])) ?>" class="card-img-top" alt="<?= esc($emp['name']) ?>">
            <?php endif; ?>
            <div class="card-body">
              <div class="fw-semibold"><?= esc($emp['name']) ?></div>
              <div class="small text-muted"><?= esc($emp['position']) ?></div>
            </div>
          </div>
        </a>
      </div>
    <?php endforeach; ?>
    <?php if (empty($employees)): ?>
      <div class="col-12"><div class="alert alert-light border">Data pegawai belum tersedia.</div></div>
    <?php endif; ?>
  </div>
</div>
