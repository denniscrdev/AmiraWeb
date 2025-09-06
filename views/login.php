<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php echo TITLE . ' - ' . $data['title']; ?></title>
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
    <link href="<?php echo BASE_URL; ?>assets/lib/owlcarousel/<?php echo BASE_URL; ?>assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- plugins -->
    <link href="<?php echo BASE_URL; ?>assets/css/plugins/material-preloader.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?php echo BASE_URL; ?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>assets/css/login.css" rel="stylesheet">
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


        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-secondary rounded p-4 p-sm-4 my-4 mx-4">
                        <div class="d-flex justify-content-center  mb-3">
                            <a href="index.html" class="text-decoration-none">
                                <h3 class="text-primary">
                                    <i class="fa fa-user-edit me-2"></i> Sistema - Amira
                                </h3>
                            </a>
                            <!-- <h3>Iniciar sesión</h3> -->
                        </div>

                        <div class="form-body">
                            <form class="row g-2" id="formulario" method="POST" autocomplete="off">

                                <!-- ESPACIO PARA EL EMAIL -->

                                <div class="input-group mb-3">
                                    <input type="email" class="form-control" id="correo" name="correo" value="coloresbeautye@gmail.com" placeholder="Correo electrónico">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                <span id="errorCorreo" class="text-danger mb-3"></span>

                                <!-- ESPACIO PARA EL PASSWORD -->
                                <div class="input-group mb-3" id="show_hide_password">
                                    <!-- Input de contraseña -->
                                    <input type="password" class="form-control" id="clave" name="clave" value="admin" placeholder="Password">

                                    <!-- Ícono candado a la izquierda -->
                                    <span class="input-group-text">
                                        <i class="fas fa-lock"></i>
                                    </span>

                                    <!-- Ícono ojo a la derecha -->
                                    <span class="input-group-text" style="cursor:pointer;" id="togglePassword">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <span id="errorClave" class="text-danger mt-0"></span>


                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">Recuerdame</label>
                                    </div>
                                    <a href="#">Has olvidado tu contraseña</a>
                                </div>

                                <button type="submit" class="btn btn-primary py-2 w-100 mb-3">Iniciar sesión</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign In End -->
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
    <script src="<?php echo BASE_URL; ?>assets/js/funcioneslogin.js"></script>
    <!-- plugins -->
    <script src="<?php echo BASE_URL; ?>assets/js/plugins/sweetalert2.all.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/js/plugins/material-preloader.js"></script>
    <script>
        const base_url = '<?php echo BASE_URL; ?>';
    </script>
    <script src="<?php echo BASE_URL; ?>assets/js/modules/login.js"></script>

</body>

</html>