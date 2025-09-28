<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Ing.comercial</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="<?php echo BASE_URL; ?>assets/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?php echo BASE_URL; ?>assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>assets/lib/owlcarousel/assets/owl.theme.default.min.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- plugins -->
    <link href="<?php echo BASE_URL; ?>assets/css/plugins/material-preloader.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>assets/css/plugins/jdSlider/jdSlider.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?php echo BASE_URL; ?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>assets/css/portal/top.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>assets/css/portal/header.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>assets/portal/css/slider.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>assets/portal/css/noticias.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <?php
        include "portal/top.php";
        ?>
    </div>

    <div class="container-fluid p-0">
        <?php
        include "portal/header.php";
        ?>
    </div>

    <div class="container-fluid p-0">

        <?php
        include "portal/slide.php";
        include "portal/banner.php";
        include "portal/noticias.php";
        include "portal/carrusel.php";
        include "portal/footer.php";
        ?>

    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="<?php echo BASE_URL; ?>assets/lib/chart/chart.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/lib/easing/easing.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/lib/waypoints/waypoints.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/lib/tempusdominus/js/moment.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="<?php echo BASE_URL; ?>assets/js/main.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/js/carrusel.js"></script>

    <script src="<?php echo BASE_URL; ?>assets/js/plugins/jdSlider/jdSlider.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/portal/js/slider.js"></script>

</body>

</html>