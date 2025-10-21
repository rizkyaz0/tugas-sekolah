<?php require_once __DIR__ . '/../../includes/config.php'; ?>
<div class="container py-5">
  <h3 class="mb-4">Profil Pengadilan</h3>
  <p>Informasi mengenai sejarah, visi misi, tugas dan fungsi, serta struktur organisasi <?= esc($SITE['full_name']) ?>.</p>
  <ul>
    <li><a href="<?= esc(base_url('?url=profil/visi-misi')) ?>">Visi & Misi</a></li>
    <li><a href="<?= esc(base_url('?url=profil/tugas-fungsi')) ?>">Tugas dan Fungsi</a></li>
    <li><a href="<?= esc(base_url('?url=profil/struktur-organisasi')) ?>">Struktur Organisasi</a></li>
  </ul>
</div>
