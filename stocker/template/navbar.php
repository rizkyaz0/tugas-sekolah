<?php
    if($pages=="" and $files=="")
    {
        $active["fberanda"]="active";
    }
    else
    {
         $active["$pages"]="active";
    }
?>


<nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
    <a href="/" class="navbar-brand p-0">
        <h1 class="text-primary"><i class="fas fa-search-dollar me-3"></i>Stocker</h1>
        <!-- <img src="stocker/img/logo.png" alt="Logo"> -->
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="fa fa-bars"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0">
            <a href="/" class="nav-item nav-link <?= $active['fberanda'] ?>">Beranda</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link  <?= $active['fprofil'] ?>" data-bs-toggle="dropdown">
                    <span class="dropdown-toggle">Profil</span>
                </a>
                <div class="dropdown-menu m-0">
                    <?php
                        $dtprofil=[
                                ["/fprofil/sejarah","Sejarah","sejarah"],
                                ["/fprofil/identitas","Identitas","identitas"],
                                ["/fprofil/lokasi","Lokasi","lokasi"],
                                ["/fprofil/galeri","Galeri","galeri"],
                                ["/fprofil/pegawai","Pegawai","pegawai"]
                            ];
                    ?>
                    <?php foreach($dtprofil as list($lilinkprofil,$linamaprofil)): ?>

                    <a href="<?= $lilinkprofil ?>" class="dropdown-item"><?= $linamaprofil ?></a>

                    <?php endforeach; ?>

                </div>
            </div>
            <a href="/fprogram/program" class="nav-item nav-link <?= $active['fprogram'] ?>">Program Sekolah</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link <?= $active['fjurusan'] ?>" data-bs-toggle="dropdown">
                    <span class="dropdown-toggle">Jurusan</span>
                </a>
                <div class="dropdown-menu m-0">
                    <?php
                        $dtjur=[
                                ["/fjurusan/jurusan/rpl","Rekayasa Perangkat Lunak","rpl"],
                                ["/fjurusan/jurusan/tkj","Teknik Komputer dan Jaringan","tkj"],
                                ["/fjurusan/jurusan/tkr","Teknik Kendaraan Ringan","tkr"],
                                ["/fjurusan/jurusan/ak","Akuntansi","ak"],
                                ["/fjurusan/jurusan/mp","Manajemen Perkantoran","mp"],
                                ["/fjurusan/jurusan/htl","Perhotelan","htl"]
                            ];
                    ?>
                    <?php foreach($dtjur as list($lilinkjur,$linamajur)): ?>

                    <a href="<?= $lilinkjur ?>" class="dropdown-item"><?= $linamajur ?></a>

                    <?php endforeach; ?>
                    
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link <?= $active['fkegiatan'] ?>" data-bs-toggle="dropdown">
                    <span class="dropdown-toggle">Kegiatan Siswa</span>
                </a>
                <div class="dropdown-menu m-0">
                    <?php
                        $dtksiswa=[
                                ["/fkegiatan/kegiatan/osis","OSIS","osis"],
                                ["/fkegiatan/kegiatan/pramuka","Pramuka","pramuka"],
                                ["/fkegiatan/kegiatan/pmr","PMR","pmr"],
                                ["/fkegiatan/kegiatan/futsal","Futsal","futsal"],
                                ["/fkegiatan/kegiatan/voli","Bola Voli","voli"],
                                ["/fkegiatan/kegiatan/jurnalistik","Jurnalistik","jurnalistik"],
                                ["/fkegiatan/kegiatan/akustik","Akustik","akustik"],
                                ["/fkegiatan/kegiatan/karawitan","Karawitan","karawitan"],
                                ["/fkegiatan/kegiatan/tari","Tari","tari"]
                            ];
                    ?>
                    <?php foreach($dtksiswa as list($lilinkdksiswa,$linamadksiswa)): ?>

                    <a href="<?= $lilinkdksiswa ?>" class="dropdown-item"><?= $linamadksiswa ?></a>
                    
                    <?php endforeach; ?>

                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link <?= $active['fkonten'] ?>" data-bs-toggle="dropdown">
                    <span class="dropdown-toggle">Konten</span>
                </a>
                <div class="dropdown-menu m-0">

                    <?php
                        $dtkonten=[
                                ["/fkonten/berita","Berita","berita"],
                                ["/fkonten/artikel","Artikel","artikel"],
                                ["/fkonten/video","Video","video"]
                            ];
                    ?>
                    <?php foreach($dtkonten as list($lilinkkonten,$linamakonten)): ?>

                    <a href="<?= $lilinkkonten ?>" class="dropdown-item"><?= $linamakonten ?></a>
                    
                    <?php endforeach; ?>

                </div>
            </div>
            <a href="/fkontak/kontak" class="nav-item nav-link <?= $active['fkontak'] ?>">Kontak Kami</a>
            <a href="/flogin/login" class="nav-item nav-link <?= $active['flogin'] ?>">Login <i class="fa fa-sign-in-alt"></i></a>
        </div>
    </div>
</nav>

