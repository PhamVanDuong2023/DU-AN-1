<?php
// session_start();


?>

<!DOCTYPE html>
<lang="en">

    <head>
        <meta charset="utf-8">
        <title>DPLShop - Online Shop Website Template</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Free HTML Templates" name="keywords">
        <meta content="Free HTML Templates" name="description">

        <!-- Favicon -->
        <link href="../../assets/clients/img/favicon.ico" rel="icon">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="../../assets/clients/lib/animate/animate.min.css" rel="stylesheet">
        <link href="../../assets/clients/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

        <!-- Customized Bootstrap Stylesheet -->
        <link href="../../assets/clients/css/style.css" rel="stylesheet">
        <style>
            .btnGroup {
                margin-left: 40px;
                display: flex;
            }

            #submitCart {
                display: none;

                position: absolute;

                bottom: 110px;

                left: 20px;

                padding-right: 2px;
                margin-left: 43px;
            }

            .product-action:hover #submitCart {
                display: block;
            }
        </style>
    </head>

    <!-- Topbar Start -->
    <div class="container-fluid">
        <?php require_once PATH_VIEW . "layouts/partials/topbar.php" ?>
    </div>
    <!-- Topbar End -->
    <?php

    if (isset($_SESSION['tb_gio_hang']) && $_SESSION['tb_gio_hang']) {
        ?>
        <div class="alert alert-success">
            <?= $_SESSION['tb_gio_hang'] ?>
        </div>
    <?php }
    unset($_SESSION['tb_gio_hang']);
    ?>


    <!-- Navbar Start -->
    <div class="container-fluid bg-dark mb-30">
        <?php require_once PATH_VIEW . "layouts/partials/navbar.php" ?>
    </div>
    <!-- Navbar End -->


    <!-- Carousel Start -->
    <div class="container-fluid mb-3">
        <?php require_once PATH_VIEW . "layouts/partials/carousel.php" ?>
    </div>
    <!-- Carousel End -->


    <!-- Featured Start -->
    <div class="container-fluid pt-5">
        <?php require_once PATH_VIEW . "layouts/partials/featured.php" ?>
    </div>
    <!-- Featured End -->


    <?php require_once PATH_VIEW . $view . ".php" ?>




    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-secondary mt-5 pt-5">
        <?php require_once PATH_VIEW . "layouts/partials/footer.php" ?>
    </div>
    <!-- Footer End -->
    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>
    <!-- <script src="../../assets/clients/js/cart.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/clients/lib/easing/easing.min.js"></script>
    <script src="../../assets/clients/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="../../assets/clients/mail/jqBootstrapValidation.min.js"></script>
    <script src="../../assets/clients/mail/contact.js"></script>


    <script src="../../../assets/clients/js/main.js"></script>
    <script src="../../../assets/clients/js/cart.js"></script>
    <script src="../../../assets/clients/js/cart_jquery.js"></script>

    </body>

    </html>