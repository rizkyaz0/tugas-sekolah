<?php require_once __DIR__ . '/../includes/config.php'; ?>
<section class="bg-hero py-5">
  <div class="container py-5">
    <div class="row align-items-center">
      <div class="col-lg-7 text-white">
        <h1 class="display-5 hero-title mb-3">Selamat Datang di <?= esc($SITE['full_name']) ?></h1>
        <p class="lead hero-subtitle mb-4"><?= esc($SITE['tagline']) ?></p>
        <div class="d-flex gap-2">
          <a href="<?= esc(base_url('?url=layanan')) ?>" class="btn btn-primary btn-lg">Layanan Publik</a>
          <a href="https://sipp.pn-subang.go.id" class="btn btn-outline-light btn-lg" target="_blank" rel="noopener">Jadwal Sidang (SIPP)</a>
        </div>
      </div>
      <div class="col-lg-5 d-none d-lg-block">
        <div class="card shadow border-0">
          <div class="card-body p-4">
            <h5 class="mb-3 text-success">Sambutan Ketua Pengadilan</h5>
            <p class="mb-3">Assalamu’alaikum warahmatullahi wabarakatuh. Selamat datang di laman resmi <?= esc($SITE['full_name']) ?>. Kami berkomitmen memberikan pelayanan peradilan yang cepat, sederhana, dan biaya ringan kepada masyarakat Subang.</p>
            <p class="mb-0">Hormat kami,<br><strong>Ketua Pengadilan Negeri Subang</strong></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="py-5 bg-light border-top">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-4">
        <div class="h-100 p-4 border rounded-3 bg-white">
          <h5 class="text-success">Visi</h5>
          <p class="mb-0">Terwujudnya badan peradilan Indonesia yang agung.</p>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="h-100 p-4 border rounded-3 bg-white">
          <h5 class="text-success">Misi</h5>
          <ul class="mb-0">
            <li>Menjaga kemandirian badan peradilan.</li>
            <li>Memberikan pelayanan hukum yang berkeadilan.</li>
            <li>Meningkatkan kepercayaan publik.</li>
          </ul>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="h-100 p-4 border rounded-3 bg-white">
          <h5 class="text-success">Tugas Pokok</h5>
          <p class="mb-0">Menyelenggarakan kekuasaan kehakiman dalam lingkungan peradilan umum pada tingkat pertama di wilayah Subang.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="py-5">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h4 class="mb-0">Berita Terbaru</h4>
      <a href="<?= esc(base_url('?url=berita')) ?>" class="btn btn-sm btn-outline-success">Lihat Semua</a>
    </div>
    <?php include __DIR__ . '/components/berita-grid.php'; ?>
  </div>
</section>

<section class="py-5 bg-light">
  <div class="container">
    <h4 class="mb-4">Layanan Publik</h4>
    <div class="row g-3">
      <div class="col-md-6 col-lg-3">
        <a href="https://ecourt.mahkamahagung.go.id" class="text-decoration-none">
          <div class="card h-100 shadow-sm">
            <div class="card-body">
              <h6 class="text-success">e-Court</h6>
              <p class="small text-muted mb-0">Pendaftaran perkara dan persidangan elektronik.</p>
            </div>
          </div>
        </a>
      </div>
      <div class="col-md-6 col-lg-3">
        <a href="https://elitigasi.mahkamahagung.go.id" class="text-decoration-none">
          <div class="card h-100 shadow-sm">
            <div class="card-body">
              <h6 class="text-success">e-Litigasi</h6>
              <p class="small text-muted mb-0">Persidangan jarak jauh berbasis elektronik.</p>
            </div>
          </div>
        </a>
      </div>
      <div class="col-md-6 col-lg-3">
        <a href="https://sipp.pn-subang.go.id" class="text-decoration-none">
          <div class="card h-100 shadow-sm">
            <div class="card-body">
              <h6 class="text-success">SIPP</h6>
              <p class="small text-muted mb-0">Informasi perkara dan jadwal sidang.</p>
            </div>
          </div>
        </a>
      </div>
      <div class="col-md-6 col-lg-3">
        <a href="https://putusan3.mahkamahagung.go.id" class="text-decoration-none">
          <div class="card h-100 shadow-sm">
            <div class="card-body">
              <h6 class="text-success">Direktori Putusan</h6>
              <p class="small text-muted mb-0">Akses database putusan pengadilan.</p>
            </div>
          </div>
        </a>
      </div>
    </div>
  </div>
</section>
