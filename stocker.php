<?php $basestocker = "/stocker";?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title><?= $JudulWeb ?></title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link rel="stylesheet" href="<?= $basestocker ?>/lib/animate/animate.min.css"/>
        <link href="<?= $basestocker ?>/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
        <link href="<?= $basestocker ?>/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="<?= $basestocker ?>/css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="<?= $basestocker ?>/css/style.css" rel="stylesheet">
    </head>

    <body>

        <!-- Spinner Start -->
        <?php include("stocker/template/spiner.php"); ?>
        <!-- Spinner End -->

        <!-- Topbar Start -->
        <?php include("stocker/template/topbarstart.php"); ?>
        <!-- Topbar End -->

        <!-- Navbar & Hero Start -->
        <div class="container-fluid position-relative p-0">
            
            <?php include("stocker/template/navbar.php"); ?>

            <?php
                if($pages=="" and $files=="")
                {
                    //Carousel
                    include("stocker/template/header/carousel.php");
                }
                else
                {
                    //Judul Header
                    include("stocker/template/header/header.php");
                }
            ?>
            
        </div>
        <!-- Navbar & Hero End -->

        <?php 
            if($pages=="" and $files=="")
            {
                //Beranda
                include("stocker/pages/umum/beranda.php");
            }
            else
            {
                //Judul Header
                include("stocker/pages/$pages/$files.php");
            }
            
        ?>


        <!-- Footer Start -->
        <?php include("stocker/template/footer.php"); ?>
        <!-- Footer End -->
        
        <!-- Copyright Start -->
         <?php include("stocker/template/copyright.php"); ?>
        <!-- Copyright End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-primary btn-lg-square rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>   

        
        <!-- JavaScript Libraries -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="<?= $basestocker ?>/lib/wow/wow.min.js"></script>
        <script src="<?= $basestocker ?>/lib/easing/easing.min.js"></script>
        <script src="<?= $basestocker ?>/lib/waypoints/waypoints.min.js"></script>
        <script src="<?= $basestocker ?>/lib/counterup/counterup.min.js"></script>
        <script src="<?= $basestocker ?>/lib/lightbox/js/lightbox.min.js"></script>
        <script src="<?= $basestocker ?>/lib/owlcarousel/owl.carousel.min.js"></script>
        

        <!-- Template Javascript -->
        <script src="<?= $basestocker ?>/js/main.js"></script>
    </body>

</html>