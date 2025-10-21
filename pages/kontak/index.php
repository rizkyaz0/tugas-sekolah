<?php
require_once __DIR__ . '/../../includes/config.php';
require_once __DIR__ . '/../../includes/functions.php';

$sent = false; $error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = trim($_POST['name'] ?? '');
  $email = trim($_POST['email'] ?? '');
  $message = trim($_POST['message'] ?? '');
  if ($name === '' || $email === '' || $message === '') {
    $error = 'Semua kolom wajib diisi.';
  } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error = 'Format email tidak valid.';
  } else {
    // In production, integrate with proper SMTP mailer. Fallback to PHP mail().
    $to = $SITE['email'];
    $subject = 'Kontak Website - ' . $SITE['short_name'];
    $body = "Nama: {$name}\nEmail: {$email}\n\nPesan:\n{$message}";
    $headers = 'From: no-reply@pn-subang.local';
    @mail($to, $subject, $body, $headers);
    $sent = true;
  }
}
?>
<div class="container py-5" style="max-width: 820px;">
  <h3 class="mb-4">Kontak</h3>
  <?php if ($sent): ?>
    <div class="alert alert-success">Terima kasih, pesan Anda telah kami terima.</div>
  <?php elseif ($error): ?>
    <div class="alert alert-danger"><?= esc($error) ?></div>
  <?php endif; ?>
  <form method="post" class="row g-3">
    <div class="col-md-6">
      <label class="form-label">Nama</label>
      <input type="text" name="name" class="form-control" required>
    </div>
    <div class="col-md-6">
      <label class="form-label">Email</label>
      <input type="email" name="email" class="form-control" required>
    </div>
    <div class="col-12">
      <label class="form-label">Pesan</label>
      <textarea name="message" rows="6" class="form-control" required></textarea>
    </div>
    <div class="col-12">
      <button class="btn btn-primary">Kirim</button>
    </div>
  </form>
  <div class="mt-4">
    <h6>Alamat</h6>
    <p class="mb-1"><?= esc($SITE['address']) ?></p>
    <div class="small text-muted">Telepon: <?= esc($SITE['phone']) ?> • Email: <?= esc($SITE['email']) ?></div>
  </div>
</div>
