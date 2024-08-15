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
require_file(PATH_CONTROLLER);
require_file(PATH_MODEL);

// điều hướng
$act = $_GET['act'] ?? '/';
match ($act) {

    '/' => (new ClientSanPhamController())->danhsachsanpham(),

    //điều hướng các trang con
    'info' => (new DashboardControllers())->info(),
    'ct-donhang' =>(new DashboardControllers())->detailOrder($_GET['id']),
    'lien-he' => (new DashboardControllers())->lienhe(),

    
    //login
    'login' => (new AuthenControllers())->login(),

    'logout' => (new AuthenControllers())->logout(),
    
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
    'add-gio-hang-sp' => (new ClientGioHangController())->themmoigiohangsp(),
    'delete-product' => (new ClientGioHangController())->xoagiohang(),
    'capnhat-giohang'=>(new ClientGioHangController())->capnhatsoluong(),

    //thanh_toan
    'thanh-toan' => (new ClientThanhToanController())->thanhToan(),
    'tien-hanh-thanh-toan'=> (new ClientThanhToanController())->tienHanhThanhToan(),
    'success-order' =>(new ClientThanhToanController())->successOrder(),
    'payment' =>(new ClientThanhToanController())->successPayment(),

    // 'online_checkout'=>(new ClientThanhToanController())->online_checkout(),
};
?>