<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>LDPShop - Online Shop Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../../assets/clients/assets/clients/lib/animate/animate.min.css" rel="stylesheet">
    <link href="../../assets/clients/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../../assets/clients/css/style.css" rel="stylesheet">
    <style>


        .table table-striped {
            margin-left: 50px;
        }

        #button {
            width: 130px;
            height: 40px;
        }
    </style>
</head>

<body>
    <!-- Topbar Start -->
    <div class="row bg-secondary py-1 px-xl-5">
        <div class="col-lg-6 d-none d-lg-block">
            <div class="d-inline-flex align-items-center h-100">

                <a class="text-body mr-3" href="">Giới thiệu</a>
                <a class="text-body mr-3" href="<?= BASE_URL ?>?act=lien-he">Liên hệ</a>
                <a class="text-body mr-3" href="<?= BASE_URL ?>?act=lien-he">Trợ giúp</a>
                <a class="text-body mr-3" href="">Câu hỏi thường gặp</a>

            </div>
        </div>
        <div class="col-lg-6 text-center text-lg-right">
            <div class="d-inline-flex align-items-center">
                <div class="btn-group">

                    <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Tài
                        khoản của tôi</button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <button class="dropdown-item" type="button">Đăng nhập</button>
                        <button class="dropdown-item" type="button">Đăng ký</button>

                    </div>
                </div>
                <div class="btn-group mx-2">
                    <button type="button" class="btn btn-sm btn-light dropdown-toggle"
                        data-toggle="dropdown">VND</button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <button class="dropdown-item" type="button">VND</button>
                        <button class="dropdown-item" type="button">GBP</button>
                        <button class="dropdown-item" type="button">CAD</button>
                        <button class="dropdown-item" type="button">USD</button>
                    </div>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-light dropdown-toggle"
                        data-toggle="dropdown">VN</button>
                    <div class="dropdown-menu dropdown-menu-right">

                        <button class="dropdown-item" type="button">vietnamese</button>
                        <button class="dropdown-item" type="button">english</button>
                        <button class="dropdown-item" type="button">china</button>

                    </div>
                </div>
            </div>
            <div class="d-inline-flex align-items-center d-block d-lg-none">
                <a href="" class="btn px-0 ml-2">
                    <i class="fas fa-heart text-dark"></i>
                    <span class="badge text-dark border border-dark rounded-circle"
                        style="padding-bottom: 2px;">0</span>
                </a>
                <a href="<?= BASE_URL ?>?act=gio-hang" class="btn px-0 ml-2">
                    <i class="fas fa-shopping-cart text-dark"></i>
                    <span class="badge text-dark border border-dark rounded-circle"
                        style="padding-bottom: 2px;">0</span>
                </a>
            </div>
        </div>
    </div>
    <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
        <div class="col-lg-4">
            <a href="" class="text-decoration-none">

                <span class="h1 text-uppercase text-primary bg-dark px-2">DPL</span>

                <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">Shop</span>
            </a>
        </div>
        <div class="col-lg-4 col-6 text-left">
            <form action="">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Tìm kiếm sản phẩm">
                    <div class="input-group-append">
                        <span class="input-group-text bg-transparent text-primary">
                            <i class="fa fa-search"></i>
                        </span>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-4 col-6 text-right">

            <p class="m-0">Dịch vụ khách hàng</p>
            <h5 class="m-0">+84 988 672 894</p>
        </div>
    </div>
    </div>


    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="row px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">

            <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse"
                href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>Danh mục</h6>

                <i class="fa fa-angle-down text-dark"></i>
            </a>
            <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light"
                id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                <div class="navbar-nav w-100">
                    <div class="nav-item dropdown dropright">

                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Váy đầm <i
                                class="fa fa-angle-right float-right mt-1"></i></a>
                        <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
                            <a href="" class="dropdown-item">Váy đầm nam</a>
                            <a href="" class="dropdown-item">Váy đầm nữ</a>
                            <a href="" class="dropdown-item">Váy đầm em bé</a>
                        </div>
                    </div>
                    <a href="" class="nav-item nav-link">Áo sơ mi</a>
                    <a href="" class="nav-item nav-link">Quần jeans</a>
                    <a href="" class="nav-item nav-link">Đồ bơi</a>
                    <a href="" class="nav-item nav-link">Đồ ngủ</a>
                    <a href="" class="nav-item nav-link">Đồ thể thao</a>
                    <a href="" class="nav-item nav-link">Jumpsuit</a>
                    <a href="" class="nav-item nav-link">Áo blazer</a>
                    <a href="" class="nav-item nav-link">Áo khoác</a>
                    <a href="" class="nav-item nav-link">Giày</a>

                </div>
            </nav>
        </div>
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                <a href="" class="text-decoration-none d-block d-lg-none">
                    <span class="h1 text-uppercase text-dark bg-light px-2">LDP</span>
                    <span class="h1 text-uppercase text-light bg-primary px-2 ml-n1">Shop</span>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">

                        <a href="<?= BASE_URL ?>" class="nav-item nav-link">Trang chủ</a>
                        <a href="<?= BASE_URL ?>?act=san-pham" class="nav-item nav-link">Cửa hàng</a>
                        <!-- <a href="detail.html" class="nav-item nav-link active">Chi tiết cửa hàng</a> -->
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Trang khác <i
                                    class="fa fa-angle-down mt-1"></i></a>
                            <div class="dropdown-menu bg-primary rounded-0 border-0 m-0">
                                <a href="<?= BASE_URL ?>?act=gio-hang" class="dropdown-item">Giỏ hàng</a>
                                <!-- <a href="<?= BASE_URL ?>?act=thanh-toan" class="dropdown-item">Thanh toán</a> -->
                            </div>
                        </div>
                        <a href="<?= BASE_URL ?>?act=lien-he" class="nav-item nav-link">Liên hệ</a>

                    </div>
                    <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                        <a href="" class="btn px-0">
                            <i class="fas fa-heart text-primary"></i>
                            <span class="badge text-secondary border border-secondary rounded-circle"
                                style="padding-bottom: 2px;">0</span>
                        </a>
                        <a href="<?= BASE_URL ?>?act=gio-hang" class="btn px-0 ml-3">
                            <i class="fas fa-shopping-cart text-primary"></i>
                            <span class="badge text-secondary border border-secondary rounded-circle"
                                style="padding-bottom: 2px;">0</span>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </div>


    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">

                    <a class="breadcrumb-item text-dark" href="#">Trang chủ</a>
                    <a class="breadcrumb-item text-dark" href="#">Thông tin người dùng</a>
                    <span class="breadcrumb-item active">Chi tiết đơn hàng</span>

                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Checkout Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="row">

                <!-- My Account Tab Menu End -->

                <!-- My Account Tab Content Start -->
                <div class="col-lg-12 col-md-12">
                    <div class="tab-content" id="myaccountContent">
                        <!-- Single Tab Content Start -->
                        <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                            <div class="myaccount-content">
                                

                                <div class="row p-2 border rounded mb-3 " style="background-color: white;">
                                    <!-- Địa chỉ giao hàng -->
                                    <div class="col-12 border-end">
                                        <div>
                                            <div class="border-bottom fs-6 pb-3 mb-3 fw-bold d-flex justify-content-between">
                                                <h6>Địa chỉ giao hàng</h6>
                                                <p class="btn btn-primary"><?= $order['ten_trang_thai'] ?></p>
                                            </div>
                                            <p>Họ và tên: <?= $order['ten_nguoi_nhan'] ?></p>
                                            <p>Số điện thoại: <?= $order['sđt_nguoi_nhan'] ?></p>
                                            <p>Địa chỉ: <?= $order['dia_chi_nguoi_nhan'] ?></p>
                                            <p>Ngày đặt hàng: <?= $order['ngay_dat'] ?></p>
                                            <p>Phương thức thanh toán: <?=$order['ten_phuong_thuc']?></p>
                                            <p>Ghi chú: <?= $order['ghi_chu'] ?></p>
                                        </div>
                                    </div>

                                    <!-- End địa chỉ giao hàng -->
                                </div>
                                <div class="row p-2 border rounded mb-3" style="background-color: white;">
                                    <h6 class="border-bottom fs-6 pb-3 mb-3 fw-bold">Sản phẩm</h6>

                                    <?php
                                    foreach ($details as $detail) : ?>

                                        <div class="row pb-3 mb-3 border-bottom">
                                            <!-- Sản phẩm -->

                                            <div class="col-10">
                                                <div class="row">
                                                    <div class="col-2">
                                                        <img src="<?=BASE_URL.'uploads/'.$detail['img_sp']?>" width="100%" alt="">
                                                    </div>
                                                    <div class="col-10">
                                                    <p><?= $detail['name_sp'] ?></p>
                                                    <p>Số lượng: <?= $detail['so_luong'] ?> x <?=$detail['don_gia']?></p>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-2 d-flex justify-content-between">
                                                <h5></h5>
                                                <h6><?= $detail['thanh_tien'] ?> đ</h6>
                                            </div>
                                            <!-- End sản phẩm -->
                                        </div>

                                    <?php
                                    endforeach ?>
                                    <div class="row m-1">
                                        <!-- Tổng tiền -->
                                        <div class="order-summary d-flex flex-column">
                                            <div class="d-flex justify-content-between">
                                                <span class="title">Tạm tính:</span>
                                                <span><?= $order['tong_tien']-30000 ?> đ</span>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <span class="title">Phí ship:</span>
                                                <span>30000 đ</span>
                                            </div>
                                            <div class="d-flex justify-content-between mt-2 border-top pt-2">
                                                <span class="title">Tổng:</span>
                                                <span><?= $order['tong_tien'] ?> đ</span>
                                            </div>
                                        </div>
                                        <!-- End tổng tiền -->
                                    </div>
                                </div>
                                <!-- kiểm tra xem id trạng thái đơn hàng có nằm trong các trường hợp như dưới hay k, nếu có thì hiển thị các form thích hợp -->
                                <?php if (in_array($order['trang_thai_id'], [1, 2, 3,  6,7, 8])) : ?>
                                    <div class="row p-2 rounded mb-3" style="background-color: white;">
                                        <!-- Form yêu cầu lý do hủy đơn hàng -->
                                        <div class="d-flex gap-3">
                                            <form id="main-form" action="" method="POST">
                                                <?php if (in_array($order['trang_thai_id'], [1, 2, 3, 6, 8])) : ?>
                                                    <input type="hidden" name="huyhang" value="11">
                                                    <button type="submit" name="huyhang" class="btn btn-danger mx-auto" onclick="return confirm('Bạn có chắc chắn hủy đơn hàng không')">Hủy đơn hàng</button>
                                                <?php else : ?>
                                                    <input type="hidden" name="hoanhang" value="10">
                                                    <button type="submit" name="hoanhang" class="btn btn-danger mx-auto"  onclick="return confirm('Bạn có chắc chắn hoàn đơn hàng không !!')">Hoàn hàng</button>
                                                <?php endif; ?>
                                            </form>
                                            <?php if (in_array($order['trang_thai_id'], [7])) : ?>
                                                <form id="main-form-2" action="" method="POST">
                                                    <input type="hidden" name="hoanthanh" value="8">
                                                    <button type="submit" name="hoanthanh" class="btn btn-success mx-auto" onclick="return confirm('Bạn có chắc chắn hoàn thành đơn hàng không !! Bạn sẽ không thể hoàn hàng nếu đồng ý !!')">Hoàn thành</button>
                                                </form>
                                            <?php endif; ?>
                                            <?php if (in_array($order['trang_thai_id'], [6])) : ?>
                                                <form id="main-form-2" action="" method="POST">
                                                    <input type="hidden" name="thanhtoan" value="8">
                                                    <button type="submit" name="thanhtoan" class="btn btn-success mx-auto" >Thanh toán</button>
                                                </form>
                                            <?php endif; ?>
                                           
                                                        </div>


                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    
                                        <!-- Single Tab Content End -->
                                        </div>
                                    </div> <!-- My Account Tab Content End -->
                            </div>
                        </div>
                    </div>

                    <!-- Checkout End -->





                    <!-- Back to Top -->
                    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
                    <!-- JavaScript Libraries -->
                    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
                    <script src="../../assets/clients/lib/easing/easing.min.js"></script>
                    <script src="../../assets/clients/lib/owlcarousel/owl.carousel.min.js"></script>

                    <!-- Contact Javascript File -->
                    <script src="../../assets/clients/mail/jqBootstrapValidation.min.js"></script>
                    <script src="../../assets/clients/mail/contact.js"></script>

                    <!-- Template Javascript -->
                    <script src="../../assets/clients/js/main.js"></script>
</body>

</html>