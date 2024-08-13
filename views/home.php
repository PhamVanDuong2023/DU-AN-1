<!-- Products Start -->
<div class="container-fluid pt-5 pb-3">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">SẢN PHẨM NỔI
            BẬT</span></h2>
    <div class="row px-xl-5">

        <?php
        foreach ($listSanPham as $key) { ?>

            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="../uploads/<?= $key['img_sp']; ?>" alt="" style="height:260px;">
                        <div class="product-action">

                            <form action="<?= BASE_URL . "?act=add-gio-hang" ?>" method="post">
                                <input type="hidden" name="id" id="" value="<?= $key['id'] ?>">
                                <input type="hidden" name="name_sp" id="" value="<?= $key['name_sp'] ?>">
                                <input type="hidden" name="price_sp" id=""
                                    value="<?= number_format($key['price_sp'], 0, '.', ',') ?>">
                                <input type="hidden" name="img_sp" id="" value="<?= $key['img_sp'] ?>">

                                <div class="btnGroup">
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                                    <button type="submit" class="btn btn-outline-dark btn-square" name="submitCart"
                                        id="submitCart"><i class="fa fa-shopping-cart"></i>
                                    </button>
                                </div>

                            </form>

                        </div>
                    </div>
                    <div class="text-center py-4">

                        <a class="h6 text-decoration-none text-truncate"
                            href="<?= BASE_URL . "?act=chi-tiet-sp&id=" . $key['id'] ?>"><?= $key['name_sp'] ?></a>

                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <a href="<?= BASE_URL . "?act=chi-tiet-sp&id=" . $key['id'] ?>">
                                <h5><?= number_format($key['price_sp'], 0, '.', ',') ?>đ</h5>
                            </a>
                            <h6 class="text-muted ml-2"><del>123.00đ</del></h6>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mb-1">
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small>(99)</small>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>

    </div>
</div>
<!-- Products End -->



<!-- Offer Start -->
<div class="container-fluid pt-5 pb-3">
    <div class="row px-xl-5">
        <div class="col-md-6">
            <div class="product-offer mb-30" style="height: 300px;">
                <img class="img-fluid" src="../../../uploads/offer1.jpg" alt="">
                <div class="offer-text">
                    <h6 class="text-white text-uppercase">Giảm 20%</h6>
                    <h3 class="text-white mb-3">Ưu Đãi Đặc Biệt</h3>
                    <a href="<?= BASE_URL . "?act=san-pham" ?>" class="btn btn-primary">Mua Ngay</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="product-offer mb-30" style="height: 300px;">
                <img class="img-fluid" src="../../../uploads/banner5.jpg" alt="">
                <div class="offer-text">
                    <h6 class="text-white text-uppercase">Giảm 20%</h6>
                    <h3 class="text-white mb-3">Ưu Đãi Đặc Biệt</h3>
                    <a href="<?= BASE_URL . "?act=san-pham" ?>" class="btn btn-primary">Mua Ngay</a>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Offer End -->


<!-- Products Start -->
<div class="container-fluid pt-5 pb-3">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">SẢN PHẨM
            MỚI</span></h2>
    <div class="row px-xl-5">
        <?php
        foreach ($listSanPham as $key) {
            ?>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="../uploads/<?= $key['img_sp']; ?>" alt="" style="height:280px;">
                        <div class="product-action">

                            <form action="<?= BASE_URL . "?act=add-gio-hang" ?>" method="post">
                                <input type="hidden" name="id" id="" value="<?= $key['id'] ?>">
                                <input type="hidden" name="name_sp" id="" value="<?= $key['name_sp'] ?>">
                                <input type="hidden" name="price_sp" id=""
                                    value="<?= number_format($key['price_sp'], 0, '.', ',') ?>">
                                <input type="hidden" name="img_sp" id="" value="<?= $key['img_sp'] ?>">

                                <div class="btnGroup">
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                                    <button type="submit" class="btn btn-outline-dark btn-square" name="submitCart"
                                        id="submitCart"><i class="fa fa-shopping-cart"></i>
                                    </button>
                                </div>

                            </form>

                        </div>
                    </div>
                    <div class="text-center py-4">

                        <a class="h6 text-decoration-none text-truncate"
                            href="<?= BASE_URL . "?act=chi-tiet-sp&id=" . $key['id'] ?>"><?= $key['name_sp'] ?></a>

                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <a href="<?= BASE_URL . "?act=chi-tiet-sp&id=" . $key['id'] ?>">
                                <h5><?= number_format($key['price_sp'], 0, '.', ',') ?>đ</h5>
                            </a>
                            <h6 class="text-muted ml-2"><del>123.00đ</del></h6>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mb-1">
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small>(99)</small>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>
<!-- Products End -->