<?php
session_start();
if(!isset($_SESSION['cart'])){
    $_SESSION['cart']=[];
}
// Require trong commons
require_once './commons/env.php';
require_once './commons/helper.php';
require_once './commons/function.php';
require_once './commons/model.php';
// requeri file trong ctrller và models


require_once './controllers/DashboardControllers.php';
require_once './controllers/AuthenControllers.php';
require_file(PATH_CONTROLLER);
require_file(PATH_MODEL);

// điều hướng
$act = $_GET['act'] ?? '/';
match ($act) {

    '/' => (new ClientSanPhamController())->danhsachsanpham(),

    //điều hướng các trang con

    'info' => (new DashboardControllers())->info(),
    'lien-he' => (new DashboardControllers())->lienhe(),
    'thanh-toan' => (new DashboardControllers())->thanhtoan(),

    //login
    'login' => (new DashboardControllers())->login(),

    'logout' => (new DashboardControllers())->logout(),
    
    //singin
    'signup'=>(new AuthenControllers())->signup(),

    //trang_san_pham
    'san-pham' => (new ClientSanPhamController())->list8sp(),
    'chi-tiet-sp' => (new ClientSanPhamController())->getOneSanPham(),

    //trang_danh_muc
    'danh-muc' => (new ClientSanPhamController())->list8sp(),

    //trang_binh_luan
    'add-binh-luan' => (new ClientBinhLuanController())->themmoibinhluan(),


    // add-gio-hang
    'gio-hang' => (new ClientGioHangController())->viewGioHang(),
    'add-gio-hang' => (new ClientGioHangController())->themmoigiohang(),
    'delete-product' => (new ClientGioHangController())->xoagiohang(),
    'capnhat-giohang'=>(new ClientGioHangController())->capnhatsoluong(),
};
?>