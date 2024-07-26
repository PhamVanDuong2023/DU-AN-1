<?php

class DashboardControllers
{
    function home()
    {
        $title = 'clothes';
        $view = 'home';
        require_once PATH_VIEW . 'layouts/master.php';
    }
    function chitietsanpham() {
        $title = 'detail';
        require_once PATH_VIEW . 'chi_tiet_sp/index.php';
        exit();
    }
    function giohang() {
        $title = 'cart';
        require_once PATH_VIEW . 'gio_hang/index.php';
        exit();
    }
    function info() {
        $title = 'thông tin khách hàng';
        require_once PATH_VIEW . 'info/index.php';
        exit();
    }
    function lienhe() {
        $title = 'liên hệ';
        require_once PATH_VIEW . 'lien_he/index.php';
        exit();
    }
    function sanpham() {
        $title = 'sản phẩm';
        require_once PATH_VIEW . 'san_pham/index.php';
        exit();
    }
    function thanhtoan() {
        $title = 'sản phẩm';
        require_once PATH_VIEW . 'thanh_toan/index.php';
        exit();
    }
}

?>