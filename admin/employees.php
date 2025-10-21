<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/functions.php';

if (!isset($_SESSION['admin_logged_in'])) { header('Location: login.php'); exit; }
$pdo = getPDO();

// Delete
if (isset($_POST['delete_id'])) {
  $id = (int)$_POST['delete_id'];
  $pdo->prepare('DELETE FROM employees WHERE id = :id')->execute([':id' => $id]);
}

$employees = $pdo->query('SELECT id, name, position, slug FROM employees ORDER BY name ASC')->fetchAll();
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pegawai - Admin</title>
  <link rel="stylesheet" href="<?= esc(base_url('assets/libs/bootstrap/dist/css/bootstrap.min.css')) ?>">
</head>
<body>
<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="mb-0">Pegawai</h5>
    <div>
      <a class="btn btn-secondary" href="index.php">Dashboard</a>
      <a class="btn btn-primary" href="employee-edit.php">Tambah</a>
    </div>
  </div>
  <div class="table-responsive">
    <table class="table table-striped align-middle">
      <thead><tr><th>Nama</th><th>Jabatan</th><th style="width:160px"></th></tr></thead>
      <tbody>
        <?php foreach ($employees as $e): ?>
        <tr>
          <td><?= esc($e['name']) ?></td>
          <td class="small text-muted"><?= esc($e['position']) ?></td>
          <td class="text-end">
            <a class="btn btn-sm btn-outline-primary" href="employee-edit.php?id=<?= $e['id'] ?>">Edit</a>
            <form method="post" class="d-inline" onsubmit="return confirm('Hapus pegawai ini?')">
              <input type="hidden" name="delete_id" value="<?= $e['id'] ?>">
              <button class="btn btn-sm btn-outline-danger">Hapus</button>
            </form>
          </td>
        </tr>
        <?php endforeach; ?>
        <?php if (empty($employees)): ?><tr><td colspan="3">Belum ada data.</td></tr><?php endif; ?>
      </tbody>
    </table>
  </div>
</div>
<script src="<?= esc(base_url('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')) ?>"></script>
</body>
</html>
