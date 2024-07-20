<?php
session_start();

// Require trong commons
require_once '../commons/env.php';
require_once '../commons/helper.php';
require_once '../commons/function.php';



// requeri file trong controllers
require_once ("./controllers/AdminDanhMucController.php");

require_once ("./controllers/DashboardControllers.php");
require_file(PATH_CONTROLLER_ADMIN);
require_file(PATH_MODEL_ADMIN);


// requeri file trong models
require_once ("./models/AdminDanhMucModel.php");



// điều hướng
 $act= $_GET['act'] ?? '/';
 match($act){

    '/'=>(new DashboardControllers())->dashboard(),
    
    //Danh mục
    'danhmuc' => (new  AdminDanhMucController())->danhsachdanhmuc(),

    'danhmuc-delete' => (new  AdminDanhMucController())-> xoadanhmuc($_GET['id']),
    
    'danhmuc-insert' => (new AdminDanhMucController())->themmoidanhmuc(),

    'danhmuc-edit' => (new AdminDanhMucController())->lay1Danhmuc($_GET['id']),

    'danhmuc-update' => (new AdminDanhMucController())->capnhatdanhmuc(),

    //Login
    
};

?>