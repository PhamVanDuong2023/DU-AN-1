<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MultiShop - Online Shop Website Template</title>
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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#button").click(function (e) { 
                e.preventDefault();
                var boxsp = ($this).parent();
                var namesp = boxsp.children("p").text();
                var pricesp = boxsp.children("p").children("span").text();
                alert(namesp);
            });
        });
    </script>
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
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
    <div class="container-fluid bg-dark mb-30">
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
                        <span class="h1 text-uppercase text-dark bg-light px-2">Multi</span>
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
    </div>


    <!-- Navbar End -->


    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Trang chủ</a>
                    <a class="breadcrumb-item text-dark" href="#">Cửa hàng</a>
                    <span class="breadcrumb-item active">Thanh toán</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Checkout Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <h5 class="section-title position-relative text-uppercase mb-3">
                    <span class="bg-secondary pr-3">Địa chỉ thanh toán</span>
                </h5>
                <div class="bg-light p-30 mb-5">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Tên</label>
                            <input class="form-control" type="text" placeholder="Firts Name">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Họ</label>
                            <input class="form-control" type="text" placeholder="Last Name">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Email</label>
                            <input class="form-control" type="text" placeholder="example@email.com">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Số điện thoại di động</label>
                            <input class="form-control" type="text" placeholder="Phone">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Địa chỉ 1</label>
                            <input class="form-control" type="text" placeholder="Address 1">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Địa chỉ 2</label>
                            <input class="form-control" type="text" placeholder="Address 2">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Quốc gia</label>
                            <select class="custom-select">
                                <option selected>Việt Nam</option>
                                <option>Afghanistan</option>
                                <option>Albania</option>
                                <option>Algeria</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Thành phố</label>
                            <input class="form-control" type="text" placeholder="City">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Quận/Huyện</label>
                            <input class="form-control" type="text" placeholder="Quận/Huyện">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Mã bưu chính</label>
                            <input class="form-control" type="text" placeholder="12345">
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="newaccount">
                                <label class="custom-control-label" for="newaccount">Tạo tài khoản</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="shipto">
                                <label class="custom-control-label" for="shipto" data-toggle="collapse"
                                    data-target="#shipping-address">Giao đến địa chỉ khác</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="collapse mb-5" id="shipping-address">
                    <h5 class="section-title position-relative text-uppercase mb-3">
                        <span class="bg-secondary pr-3">Địa chỉ giao hàng</span>
                    </h5>
                    <div class="bg-light p-30">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Tên</label>
                                <input class="form-control" type="text" placeholder="Firts Name">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Họ</label>
                                <input class="form-control" type="text" placeholder="Last Name">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Email</label>
                                <input class="form-control" type="text" placeholder="example@email.com">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Số điện thoại di động</label>
                                <input class="form-control" type="text" placeholder="Phone">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Địa chỉ 1</label>
                                <input class="form-control" type="text" placeholder="Address 1">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Địa chỉ 2</label>
                                <input class="form-control" type="text" placeholder="Address 2">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Quốc gia</label>
                                <select class="custom-select">
                                    <option selected>Việt Nam</option>
                                    <option>Afghanistan</option>
                                    <option>Albania</option>
                                    <option>Algeria</option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Thành phố</label>
                                <input class="form-control" type="text" placeholder="City">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Quận/Huyện</label>
                                <input class="form-control" type="text" placeholder="Huyện">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Mã bưu chính</label>
                                <input class="form-control" type="text" placeholder="12345">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <h5 class="section-title position-relative text-uppercase mb-3">
                    <span class="bg-secondary pr-3">Tổng đơn hàng</span>
                </h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom">
                        <h6 class="mb-3">Sản phẩm</h6>
                        <div class="d-flex justify-content-between">
                            <p>Tên sản phẩm 1</p>
                            <p>$ <span>150</span></p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p>Tên sản phẩm 2</p>
                            <p>$150</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p>Tên sản phẩm 3</p>
                            <p>$150</p>
                        </div>
                    </div>
                    <div class="border-bottom pt-3 pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Tổng phụ</h6>
                            <h6>$150</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Phí vận chuyển</h6>
                            <h6 class="font-weight-medium">$10</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Tổng cộng</h5>
                            <h5>$160</h5>
                        </div>
                    </div>
                </div>
                <div class="mb-5">
                    <h5 class="section-title position-relative text-uppercase mb-3">
                        <span class="bg-secondary pr-3">Thanh toán</span>
                    </h5>
                    <div class="bg-light p-30">
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="paypal">
                                <label class="custom-control-label" for="paypal">Paypal</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="directcheck">
                                <label class="custom-control-label" for="directcheck">Thanh toán trực tiếp</label>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="banktransfer">
                                <label class="custom-control-label" for="banktransfer">Chuyển khoản ngân hàng</label>
                            </div>
                        </div>
                        <button class="btn btn-block btn-primary font-weight-bold py-3" id="button">Đặt hàng</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Checkout End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-secondary mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <h5 class="text-secondary text-uppercase mb-4">Liên lạc</h5>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i><a href="#">123 Trịnh Văn Bô ,
                        Nam từ Liêm , Hà Nội</a></p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i><a
                        href="#">phamvanduong2004tb@gmail.com</a></p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i><a href="#">+84988672894</a></p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Cửa hàng</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="<?= BASE_URL ?>"><i
                                    class="fa fa-angle-right mr-2"></i>Trang
                                chủ</a>
                            <a class="text-secondary mb-2" href="<?= BASE_URL ?>?act=san-pham"><i
                                    class="fa fa-angle-right mr-2"></i>Cửa hàng
                                của chúng tôi</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Cửa hàng
                                Detail</a>
                            <a class="text-secondary mb-2" href="<?= BASE_URL ?>?act=gio-hang"><i
                                    class="fa fa-angle-right mr-2"></i>Mua sắm
                                Cart</a>
                            <a class="text-secondary mb-2" href="<?= BASE_URL ?>?act=thanh-toan"><i
                                    class="fa fa-angle-right mr-2"></i>Thanh
                                toán</a>
                            <a class="text-secondary" href="<?= BASE_URL ?>?act=lien-he"><i
                                    class="fa fa-angle-right mr-2"></i>Liên hệ với
                                chúng tôi</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Tài khoản của tôi</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="<?= BASE_URL ?>"><i
                                    class="fa fa-angle-right mr-2"></i>Trang
                                chủ</a>
                            <a class="text-secondary mb-2" href="<?= BASE_URL ?>?act=san-pham"><i
                                    class="fa fa-angle-right mr-2"></i>Cửa hàng
                                của chúng tôi</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Cửa hàng
                                Detail</a>
                            <a class="text-secondary mb-2" href="<?= BASE_URL ?>?act=gio-hang"><i
                                    class="fa fa-angle-right mr-2"></i>Mua sắm
                                Cart</a>
                            <a class="text-secondary mb-2" href="<?= BASE_URL ?>?act=thanh-toan"><i
                                    class="fa fa-angle-right mr-2"></i>Thanh
                                toán</a>
                            <a class="text-secondary" href="<?= BASE_URL ?>?act=lien-he"><i
                                    class="fa fa-angle-right mr-2"></i>Liên hệ với
                                chúng tôi</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Bản tin</h5>
                        <form action="<?= BASE_URL ?>?act=singin">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Your Email Address">
                                <div class="input-group-append">
                                    <button class="btn btn-primary">Đăng ký</button>
                                </div>
                            </div>
                        </form>
                        <h6 class="text-secondary text-uppercase mt-4 mb-3">Theo dõi chúng tôi</h6>
                        <div class="d-flex">
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-primary btn-square" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-top mx-xl-5 py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-secondary">
                    &copy; <a class="text-primary" href="#">Domain</a>.Mọi quyền được bảo lưu.Thiết kế bởi
                    <a class="text-primary" href="https://htmlcodex.com">DPL Code</a>
                    <br>Phân phối bởi: <a href="https://themewagon.com" target="_blank">DPL</a>
                </p>
            </div>
            <div class="col-md-6 px-xl-0 text-center text-md-right">
                <img class="img-fluid" src="img/payments.png" alt="">
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


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