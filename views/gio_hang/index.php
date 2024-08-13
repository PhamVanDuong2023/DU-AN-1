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
    <!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> -->
    <script>
        


        function capNhatTongTien(tr) {
            var soluong = parseInt(tr.find("#number").val());
            var giaspText = tr.find(".giasp").text().replace(/,/g, '').trim();
            var giasp = parseFloat(giaspText);
            
            var tongtien = giasp * soluong;
            var tongCart=
            tr.find(".tongtien").text(tongtien.toLocaleString('en-US'));
            }
        function capNhatTongDonHang() {
            var tongDonHang = 0;

            
            $("#tableCart tr").each(function() {
                if ($(this).hasClass('title')) return;
                var checkbox = $(this).find(".chonsp");
                if (checkbox.is(":checked")) {
                    var tongTienSP = $(this).find(".tongtien").text().replace(/,/g, '').trim();
                    tongDonHang += parseFloat(tongTienSP);
                }
                
                // var tongTienSP = $(this).find(".tongtien").text().replace(/,/g, '').trim();
                
                // tongDonHang += parseFloat(tongTienSP);
            });
            // alert(tongDonHang);
            // Cập nhật tổng đơn hàng
            $(".tongCart").text(tongDonHang.toLocaleString('en-US'));
           tongCong()
            
        }
        function tongCong(){
            var tongCong=0;
            var thanhToan = $("#thanhToan");

            var tongCart = thanhToan.find(".tongCart").text().replace(/,/g, '').trim();

            var tongCartFloat=parseFloat(tongCart);
            var ship=30000;
            if (tongCartFloat>0) {
                tongCong=tongCartFloat+ship;
            } else {
                tongCong=0;
            }
            

            

            $("#tongCong").text(tongCong.toLocaleString('en-US'));

        }

        function tangsoluong(x) {
            console.log('Hàm tangsoluong được gọi');

            // Tìm phần tử cha của nút nhấn
            var parent = $(x).closest("tr"); // Tìm hàng <tr> chứa nút nhấn

            // Tìm phần tử input số lượng trong hàng hiện tại
            var soluong_old = parent.find("#number");

            // Lấy giá trị hiện tại của input
            var soluong_value = parseInt(soluong_old.val());
            console.log('Giá trị hiện tại của input:', soluong_value);

            // Tăng giá trị lên 1
            var soluong_new = soluong_value + 1;
            if (soluong_new < 21) {
                soluong_old.val(soluong_new);
            } else {
                alert("Bạn chỉ được mua tối đa 20 sản phẩm!!");
            }

            // Lấy ID sản phẩm từ phần tử ẩn
            var productId = parent.find('input[type="hidden"]').data('product-id');
            
            $.ajax({
                url: "<?= BASE_URL ?>?act=capnhat-giohang",
                type: 'post',
                data: { id: productId, quantity: soluong_new },
                success: function(response) {
                    console.log("Số lượng đã được cập nhật !!");
                }
            });

            // Cập nhật tổng tiền
            capNhatTongTien(parent);
            chonsp();
           
    }

        function giamsoluong(x) {
            console.log('Hàm tangsoluong được gọi');

            // Tìm phần tử cha của nút nhấn
            var parent = $(x).closest("tr"); // Tìm hàng <tr> chứa nút nhấn

            // Tìm phần tử input số lượng trong hàng hiện tại
            var soluong_old = parent.find("#number");

            // Lấy giá trị hiện tại của input
            var soluong_value = parseInt(soluong_old.val());
            console.log('Giá trị hiện tại của input:', soluong_value);

            // Tăng giá trị lên 1
            var soluong_new = soluong_value - 1;
            if (soluong_new > 0) {
                soluong_old.val(soluong_new);
            } else {
                alert("Bạn chỉ được mua tối đa 20 sản phẩm!!");
            }

            // Lấy ID sản phẩm từ phần tử ẩn
            var productId = parent.find('input[type="hidden"]').data('product-id');
            
            $.ajax({
                url: "<?= BASE_URL ?>?act=capnhat-giohang",
                type: 'post',
                data: { id: productId, quantity: soluong_new },
                success: function(response) {
                    console.log("Số lượng đã được cập nhật !!");
                }
            });

            // Cập nhật tổng tiền
            capNhatTongTien(parent);
            chonsp();
            // capNhatTongDonHang();
            // tongCong();
            
        }
        function kiemtrasoluong(x) {
            var num = parseInt(x.value);

            // Kiểm tra giá trị không phải là số hoặc rỗng
            if (isNaN(num) || x.value.trim() === "") {
                x.value = 1;
                alert('Vui lòng nhập số lượng hợp lệ');
                return;
            }

            if (num < 1) {
                x.value = 1;
                alert('Nhập ít nhất 1 sản phẩm');
                return;
            }

            if (num > 20) {
                x.value = 20;
                alert('Nhập tối đa 20 sản phẩm');
                return;
            }
            var id_product = x.nextElementSibling.nextElementSibling;
            // alert(id_product.value);
            var productId = id_product.dataset.productId;
            $.ajax({
                url : "<?=BASE_URL?>?act=capnhat-giohang",
                type : 'post',
                data : {id:productId , quantity:x.value},
                success : function(response) {
                    console.log("số lượng đã được cập nhật !!");
                }
            })
            capNhatTongTien($(x).closest("tr"));
            capNhatTongDonHang();
        };

        function chonsp(){
                capNhatTongDonHang();
            };
        
        function checkClick () { 
            
            var coCheckboxDuocChon = $(".chonsp:checked").length > 0;

            if (coCheckboxDuocChon) {
                var selectProduct = [];
                $('.chonsp:checked').each(function() {
                    
                    
                    selectProduct.push($(this).val());
                });
                
                $.ajax({
                url : "<?=BASE_URL?>?act=thanh-toan",
                type : 'post',
                data : {select_product: selectProduct},
                success : function(response) {
                    console.log("thành công rồi");
                }
            })
            } else {
                event.preventDefault();
                alert("Vui lòng chọn ít nhất một sản phẩm trước khi thanh toán.");
            }
            
         };
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

                            <a href="<?= BASE_URL ?>?act=gio-hang" class="btn px-0 ml-3" id="boxcart">
                                <i class="fas fa-shopping-cart text-primary"></i>
                                <span class="badge text-secondary border border-secondary rounded-circle"
                                    style="padding-bottom: 2px;"></span>
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
                    <span class="breadcrumb-item active">Giỏ hàng</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Cart Start -->
    <div class="container-fluid" id="cart">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <?php

                if (isset($_SESSION['tb_xoa']) && $_SESSION['tb_xoa']) {
                    ?>
                    <div class="alert alert-success">
                        <?= $_SESSION['tb_xoa'] ?>
                    </div>
                <?php }
                unset($_SESSION['tb_xoa']);
                ?>
                <table class="table table-light table-borderless table-hover text-center mb-0" id="tableCart">
                    <thead class="thead-dark">
                        <tr class="title">
                            <th></th>
                            <th>Sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Tổng</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle" id="giohang">

                        
                        <?php
                        if (count($_SESSION['cart']) > 0) {
                            $tongTien=0;
                            $ship=30000;

                            foreach ($_SESSION['cart'] as $item) {
                                
                                $price = (float) str_replace(',', '', $item['price_sp']);
                                $tongTien+=$price*$item['soluong_sp'];
                                    ?>
                                <tr>
                                    <td><input type="checkbox" id="optionProduct" name="select-product[]" class="chonsp" onclick="chonsp()" value="<?= $item['id'] ?>"></td>
                                    
                                    <td class="align-middle"><img src="../../uploads/<?= $item['img_sp'] ?>" alt=""
                                            style="width: 50px;">
                                        <?= $item['name_sp'] ?></td>
                                    <td class="align-middle"><span class="giasp"><?= number_format($price, 0, '.', ',') ?></span>đ
                                    </td>
                                    <td class="align-middle">
                                        
                                        <div style="width: 120px; " class="btn-group" >
                                            <div class="input-group-btn">
                                                <button class="btn btn-primary" onclick="giamsoluong(this)">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                            </div>
                                            <input type="text" onchange="kiemtrasoluong(this)"
                                                class="form-control form-control-sm mx-auto border-0 text-center"  value="<?= $item['soluong_sp'] ?>"
                                                id="number">
                                            <div class="input-group-btn">
                                                <button class="btn btn-primary" onclick="tangsoluong(this)">
                                                    <i class="fa fa-plus" ></i>
                                                </button>
                                            </div> 
                                            <input type="hidden" data-product-id="<?= $item['id'] ?>" >
                                            <input type="hidden" value="<?=$tongTien?>" class="tongCart">
                                        </div>
                                    </td>
                                    <td class="align-middle"><span
                                            class="tongtien"><?= number_format($price * $item['soluong_sp'], 0, '.', ',') ?></span>đ
                                    </td>
                                    <td class="align-middle">
                                        <a href="<?= BASE_URL ?>?act=delete-product&id=<?= $item['id'] ?>"><img
                                                src="../../uploads/delete.jpg" alt="img xoa" width="40px"></a>
                                    </td>
                                </tr>
                                <?php
                            }
                        }else{
                            $ship=0;
                        }
                        ?>
                        
                        <!-- Các hàng sản phẩm khác tương tự -->
                    </tbody>
                </table>

            </div>
            <div class="col-lg-4">
                <form class="mb-30" action="">
                    <div class="input-group">
                        <input type="text" class="form-control border-0 p-4" placeholder="Mã giảm giá">
                        <div class="input-group-append">
                            <button class="btn btn-primary">Áp dụng mã giảm giá</button>
                        </div>
                    </div>
                </form>
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Tóm tắt
                        giỏ hàng</span></h5>
                <div class="bg-light p-30 mb-5" id="thanhToan">
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Tổng phụ</h6>
                            <h6 class="tongCart" style="margin-left:150px;">0<?php
                                //  if(isset($tongTien)){
                                //     echo number_format($tongTien, 0, '.', ',');
                                // }else{
                                //     echo 0;
                                // }
                            ?></h6><h6>đ</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Vận chuyển</h6>
                            <h6 class="font-weight-medium" style="margin-left:150px;"><?= number_format($ship, 0, '.', ',') ?></h6><h6>đ</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Tổng cộng</h5>
                            <h5 id="tongCong" style="margin-left:100px;">0<?php
                            // if(isset($tongTien)){
                            //     echo number_format($tongTien+$ship, 0, '.', ',');
                            // }else{
                            //     echo 0;
                            // }
                            ?></h5><h5>đ</h5>
                        </div>
                        <!-- <button class="btn btn-block btn-primary font-weight-bold my-3 py-3">Tiến hành thanh toán</button> -->
                        <a href="<?= BASE_URL ?>?act=thanh-toan">
                            <button type="button"
                                class="btn btn-block btn-primary font-weight-bold my-3 py-3" id="thanhToanBtn" onclick="checkClick()">Tiến hành thanh
                                toán</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->
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


    <!-- Template Javascript -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>
    <!-- <script src="../../assets/clients/js/cart.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/clients/lib/easing/easing.min.js"></script>
    <script src="../../assets/clients/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="../../assets/clients/mail/jqBootstrapValidation.min.js"></script>
    <script src="../../assets/clients/mail/contact.js"></script>


    <script src="../../assets/clients/js/main.js"></script>
    <!-- <script src="../../assets/clients/js/cart.js"></script> -->
    <script src="../../assets/clients/js/cart_jquery.js"></script>


</body>

</html>