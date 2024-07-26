<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title><?php echo $title ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="../../../assets/admins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"
        type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="../../../assets/admins/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="../../../assets/admins/plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet"
        type="text/css" />
    <!-- Daterange picker -->
    <link href="../../../assets/admins/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet"
        type="text/css" />
    <!-- Theme style -->
    <link href="../../../assets/admins/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="../../../assets/admins/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- Latest compiled and minified CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">



    <!-- Latest compiled JavaScript -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body class="skin-blue">
    <div class="wrapper">
        <!-- header -->
        <?php require_once PATH_VIEW_ADMIN . "layouts/partials/header.php" ?>
        <!-- aside -->
        <aside class="main-sidebar">
            <?php require_once PATH_VIEW_ADMIN . "layouts/partials/aside.php" ?>
        </aside>
        <!-- view -->
        <div class="content-wrapper">
            <?php require_once PATH_VIEW_ADMIN . $view . ".php" ?>
        </div>

        <!-- footer -->
        <?php
        // require_once PATH_VIEW_ADMIN."layouts/partials/footer.php"  
        ?>
    </div>
    <div>
        <script src="../../../assets/admins/plugins/jQuery/jQuery-2.1.3.min.js"></script>
        <!-- Bootstrap 3.3.2 JS -->
        <script src="../../../assets/admins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- FastClick -->
        <script src='../../../assets/admins/plugins/fastclick/fastclick.min.js'></script>
        <!-- AdminLTE App -->
        <script src="../../../assets/admins/dist/js/app.min.js" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="../../../assets/admins/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="../../../assets/admins/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"
            type="text/javascript"></script>
        <script src="../../../assets/admins/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"
            type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="../../../assets/admins/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- datepicker -->
        <script src="../../../assets/admins/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="../../../assets/admins/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
        <!-- SlimScroll 1.3.0 -->
        <script src="../../../assets/admins/plugins/slimScroll/jquery.slimscroll.min.js"
            type="text/javascript"></script>
        <!-- ChartJS 1.0.1 -->
        <script src="../../../assets/admins/plugins/chartjs/Chart.min.js" type="text/javascript"></script>

        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="../../../assets/admins/dist/js/pages/dashboard2.js" type="text/javascript"></script>

        <!-- AdminLTE for demo purposes -->
        <script src="../../../assets/admins/dist/js/demo.js" type="text/javascript"></script>
        <script src="https://cdn.datatables.net/2.1.2/js/dataTables.js"></script>
        

        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    </div>
</body>


</html>