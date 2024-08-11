<?php
session_start();

// Require trong commons
require_once '../commons/env.php';
require_once '../commons/helper.php';
require_once '../commons/function.php';



// requeri file trong controllers
require_once ("./controllers/AdminDanhMucController.php");
require_once ("./controllers/AdminDonHangController.php");
// require_once ("./controllers/AdminSanPhamController.php");
require_once ("./controllers/DashboardControllers.php");
require_file(PATH_CONTROLLER_ADMIN);
require_file(PATH_MODEL_ADMIN);


// requeri file trong models
require_once ("./models/AdminDanhMucModel.php");
require_once ("./models/AdminDonhangModel.php");
require_once ("./models/AdminSanPhamModel.php");


// điều hướng
$act = $_POST['act'] ?? $_GET['act'] ?? '/';

 match($act){

    '/'=>(new DashboardControllers())->dashboard(),

    'addlogin'=>(new DashboardControllers())->addformlogin(),
    
    //Danh mục
    'danhmuc' => (new  AdminDanhMucController())->danhsachdanhmuc(),

    'danhmuc-delete' => (new  AdminDanhMucController())-> xoadanhmuc($_GET['id']),

    'danhmuc-add-form-insert'=> (new AdminDanhMucController())->addform(),

    'danhmuc-insert' => (new AdminDanhMucController())->themmoidanhmuc(),

    'danhmuc-edit' => (new AdminDanhMucController())->lay1Danhmuc($_GET['id']),

    'danhmuc-update' => (new AdminDanhMucController())->capnhatdanhmuc(),

    //Login
    'login' => (new DashboardControllers())->login(),

    'logout' => (new DashboardControllers())->logout(),
    
    // Đơn hàng
     'don-hang' => (new AdminDonHangController())->danhsachdonhang(),

     'donhang-update' => (new AdminDonHangController())->capnhatDonHang(),

     'donhang-edit' => (new AdminDonHangController())->editDonHang($_GET['id']),

     'chi-tiet-don-hang' => (new AdminDonHangController())->chitietDonHang(),
     
     'donhang-chitet' => (new AdminDonHangController())->chitietdonhang(),

     'delete-don-hang' => (new AdminDonHangController())->xoadonhang($_GET['id_don_hang']),

     //sản phẩm
     'sanpham' => (new AdminSanPhamController())->danhSachsp(),

     'form-them-san-pham'=> (new AdminSanPhamController())->formAddsp(),

     'sanpham-xoa' => (new AdminSanPhamController())->xoasp($_GET['id']),
     
     'sanpham-edit' => (new AdminSanPhamController())-> capnhatsanpham($_GET['id']),
};

?>