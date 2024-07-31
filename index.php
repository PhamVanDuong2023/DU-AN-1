<?php
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
$act= $_GET['act'] ?? '/';
match($act){
    '/'=>(new ClientSanPhamController())->danhsachsanpham(),

    //điều hướng các trang con
    
    'gio-hang' => (new DashboardControllers())->giohang(),
    'info' => (new DashboardControllers())->info(),
    'lien-he' => (new DashboardControllers())->lienhe(),
    
    'thanh-toan' => (new DashboardControllers())->thanhtoan(),

    //trang_san_pham
    'san-pham' => (new ClientSanPhamController())->list8sp(),

    'chi-tiet-sp' => (new ClientSanPhamController())->getOneSanPham(),
};

?>