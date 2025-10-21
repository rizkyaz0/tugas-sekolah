<?php require_once __DIR__ . '/config.php'; ?>
<footer class="pt-5 pb-4 mt-5 text-white" style="background:#0b2e13;">
  <div class="container">
    <div class="row g-4">
      <div class="col-md-6 col-lg-4">
        <div class="d-flex align-items-start">
          <img src="<?= esc(base_url('images/logo.png')) ?>" alt="Logo" height="60" class="me-3">
          <div>
            <h5 class="mb-1"><?= esc($SITE['full_name']) ?></h5>
            <div class="small text-white-50"><?= esc($SITE['institution']) ?></div>
          </div>
        </div>
        <p class="mt-3 mb-1">Alamat:</p>
        <p class="small mb-2"><?= esc($SITE['address']) ?></p>
        <p class="small mb-0">Telepon: <?= esc($SITE['phone']) ?> • Email: <?= esc($SITE['email']) ?></p>
        <div class="mt-3 d-flex gap-2">
          <a class="btn btn-sm btn-outline-light" href="<?= esc($SITE['facebook']) ?>" target="_blank" rel="noopener"><i class="fab fa-facebook"></i></a>
          <a class="btn btn-sm btn-outline-light" href="<?= esc($SITE['twitter']) ?>" target="_blank" rel="noopener"><i class="fab fa-x-twitter"></i></a>
          <a class="btn btn-sm btn-outline-light" href="<?= esc($SITE['instagram']) ?>" target="_blank" rel="noopener"><i class="fab fa-instagram"></i></a>
          <a class="btn btn-sm btn-outline-light" href="<?= esc($SITE['youtube']) ?>" target="_blank" rel="noopener"><i class="fab fa-youtube"></i></a>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <h6 class="text-uppercase text-gold">Layanan Publik</h6>
        <ul class="list-unstyled small">
          <li><a class="footer-link" href="https://ecourt.mahkamahagung.go.id" target="_blank" rel="noopener">e-Court Mahkamah Agung</a></li>
          <li><a class="footer-link" href="https://eraterang.mahkamahagung.go.id" target="_blank" rel="noopener">e-RATERANG</a></li>
          <li><a class="footer-link" href="https://sipp.pn-subang.go.id" target="_blank" rel="noopener">SIPP PN Subang (Jadwal Sidang)</a></li>
          <li><a class="footer-link" href="https://putusan3.mahkamahagung.go.id" target="_blank" rel="noopener">Direktori Putusan</a></li>
        </ul>
      </div>
      <div class="col-md-6 col-lg-4">
        <h6 class="text-uppercase text-gold">Tautan Penting</h6>
        <ul class="list-unstyled small">
          <li><a class="footer-link" href="https://www.mahkamahagung.go.id" target="_blank" rel="noopener">Mahkamah Agung RI</a></li>
          <li><a class="footer-link" href="https://jabar.bps.go.id" target="_blank" rel="noopener">BPS Provinsi Jawa Barat</a></li>
          <li><a class="footer-link" href="#">Layanan Informasi Publik</a></li>
          <li><a class="footer-link" href="#">Whistleblowing System</a></li>
        </ul>
      </div>
    </div>
    <hr class="border-secondary mt-4">
    <div class="d-flex flex-column flex-md-row justify-content-between small text-white-50">
      <div>© <?= date('Y') ?> <?= esc($SITE['full_name']) ?>. All rights reserved.</div>
      <div>"<?= esc($SITE['tagline']) ?>"</div>
    </div>
  </div>
</footer>
<script src="<?= esc(base_url('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')) ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init({ duration: 700, easing: 'ease-out-quart', once: true });
  // Simple parallax for hero
  document.addEventListener('scroll', function(){
    var el = document.querySelector('.bg-hero');
    if(!el) return;
    var y = window.scrollY * 0.3;
    el.style.backgroundPosition = 'center calc(50% + '+(y)+'px)';
  }, { passive:true });
</script>
</body>
</html>
