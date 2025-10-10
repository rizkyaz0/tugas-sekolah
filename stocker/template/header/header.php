<?php 
    switch($pages)
    {
        case "fprofil":
            foreach($dtprofil as $jProfil) {
                if ($jProfil[2] === $files) {
                    $HeaderJudul=$jProfil[1];
                }
            }
        break;
        case "fprogram":
            $HeaderJudul="Program Sekolah";
        break;
        case "fjurusan":
             foreach($dtjur as $jJur) {
                if ($jJur[2] === $var[0]) {
                    $HeaderJudul=$jJur[1];
                }
            }
        break;
        case "fkegiatan":
             foreach($dtksiswa as $jtksiswa) {
                if ($jtksiswa[2] === $var[0]) {
                    $HeaderJudul=$jtksiswa[1];
                }
            }
        break;
        case "fkonten":
             foreach($dtkonten as $jKonten) {
                if ($jKonten[2] === $files) {
                    $HeaderJudul=$jKonten[1];
                }
                
            }
            // $HeaderJudul="$files";
        break;
        case "fkontak":
            $HeaderJudul="Kontak Kami";
        break;
        case "flogin":
            $HeaderJudul="Login";
        break;
    }
?>

<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s"><?= $HeaderJudul ?></h4>  
    </div>
</div>
<!-- Header End -->