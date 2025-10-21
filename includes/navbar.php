<?php
require_once __DIR__ . '/functions.php';
require_once __DIR__ . '/config.php';
$active = $currentRoute ?? '';
?>
<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom sticky-top">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center" href="<?= esc(base_url()) ?>">
      <img src="<?= esc(base_url('images/logo.png')) ?>" alt="Logo PN Subang" height="52" class="me-2">
      <span class="fw-bold lh-sm">
        <?= esc($SITE['full_name']) ?><br>
        <small class="text-secondary"><?= esc($SITE['institution']) ?></small>
      </span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mainNav">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link <?= is_active('beranda',$active) ?>" href="<?= esc(base_url()) ?>">Beranda</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle <?= is_active('profil',$active) ?>" href="#" role="button" data-bs-toggle="dropdown">Profil</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?= esc(base_url('?url=profil/visi-misi')) ?>">Visi & Misi</a></li>
            <li><a class="dropdown-item" href="<?= esc(base_url('?url=profil/tugas-fungsi')) ?>">Tugas dan Fungsi</a></li>
            <li><a class="dropdown-item" href="<?= esc(base_url('?url=profil/struktur-organisasi')) ?>">Struktur Organisasi</a></li>
          </ul>
        </li>
        <li class="nav-item"><a class="nav-link <?= is_active('informasi',$active) ?>" href="<?= esc(base_url('?url=informasi')) ?>">Informasi</a></li>
        <li class="nav-item"><a class="nav-link <?= is_active('layanan',$active) ?>" href="<?= esc(base_url('?url=layanan')) ?>">Layanan</a></li>
        <li class="nav-item"><a class="nav-link <?= is_active('berita',$active) ?>" href="<?= esc(base_url('?url=berita')) ?>">Berita</a></li>
        <li class="nav-item"><a class="nav-link <?= is_active('pegawai',$active) ?>" href="<?= esc(base_url('?url=pegawai')) ?>">Pegawai</a></li>
        <li class="nav-item"><a class="nav-link <?= is_active('kontak',$active) ?>" href="<?= esc(base_url('?url=kontak')) ?>">Kontak</a></li>
      </ul>
    </div>
  </div>
</nav>
