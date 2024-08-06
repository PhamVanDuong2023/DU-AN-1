<div class="row px-xl-5">

    <div class="col-lg-3 d-none d-lg-block">
        <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse"
            href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
            <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>Danh Mục</h6>
            <i class="fa fa-angle-down text-dark"></i>
        </a>
        <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light"
            id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
            <div class="navbar-nav w-100">
               <?php
                    foreach($listDanhMuc as $key) { ?>
                        <a href="" class="nav-item nav-link"><?= $key['name_danhmuc'] ?></a>
                    <?php
                    }
                ?>
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
                    <a href="<?= BASE_URL ?>" class="nav-item nav-link active">Trang Chủ</a>
                    <a href="<?= BASE_URL ?>?act=san-pham" class="nav-item nav-link">Cửa Hàng</a>
                    <!-- <a href="<?= BASE_URL ?>?act=chi-tiet-sp" class="nav-item nav-link">Chi Tiết Sản Phẩm</a> -->
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Trang <i
                                class="fa fa-angle-down mt-1"></i></a>
                        <div class="dropdown-menu bg-primary rounded-0 border-0 m-0">
                            <a href="<?= BASE_URL ?>?act=gio-hang" class="dropdown-item">Giỏ Hàng</a>
                            <!-- <a href="<?= BASE_URL ?>?act=thanh-toan" class="dropdown-item">Thanh Toán</a> -->


                        </div>
                    </div>
                    <a href="<?= BASE_URL ?>?act=lien-he" class="nav-item nav-link">Liên Hệ</a>
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
                                    style="padding-bottom: 2px;"><?=$soluong?></span>
                            </a>
                        </div>
                </div>
            </div>
        </nav>
    </div>
</div>