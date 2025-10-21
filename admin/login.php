<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/functions.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $u = $_POST['username'] ?? '';
  $p = $_POST['password'] ?? '';
  if ($u === $ADMIN['username'] && $p === $ADMIN['password']) {
    $_SESSION['admin_logged_in'] = true;
    header('Location: index.php');
    exit;
  }
  $error = 'Username atau password salah.';
}
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Admin - <?= esc($SITE['short_name']) ?></title>
  <link rel="stylesheet" href="<?= esc(base_url('assets/libs/bootstrap/dist/css/bootstrap.min.css')) ?>">
</head>
<body class="bg-light">
<div class="container py-5" style="max-width:420px;">
  <div class="card shadow-sm">
    <div class="card-body p-4">
      <h5 class="mb-3">Login Admin</h5>
      <?php if ($error): ?><div class="alert alert-danger py-2"><?= esc($error) ?></div><?php endif; ?>
      <form method="post">
        <div class="mb-3">
          <label class="form-label">Username</label>
          <input class="form-control" name="username" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="password" class="form-control" name="password" required>
        </div>
        <button class="btn btn-primary w-100">Masuk</button>
      </form>
    </div>
  </div>
</div>
<script src="<?= esc(base_url('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')) ?>"></script>
</body>
</html>
