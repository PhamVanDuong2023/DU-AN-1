<?php
session_start();
// Require trong commons
require_once '../commons/env.php';
require_once '../commons/helper.php';
require_once '../commons/function.php';
require_once '../commons/model.php';
// requeri file trong ctrller và models


require_once("./controllers/AdminTaiKhoanController.php");

require_once("./controllers/DashboardControllers.php");
require_file(PATH_CONTROLLER_ADMIN);
require_file(PATH_MODEL_ADMIN);

require_once("./models/AdminTaiKhoanModel.php");


// điều hướng
$act = $_GET['act'] ?? '/';
match ($act) {

    '/' => (new DashboardControllers())->dashboard(),
    'taikhoan' => (new AdminTaiKhoanController())->danhsachtaikhoan(),
    'taikhoan-delete' => (new AdminTaiKhoanController())->xoataikhoan($_GET['id']),
    'taikhoan-add-form-insert' => (new AdminTaiKhoanController())->addforminsert(),
    'taikhoan-insert' => (new AdminTaiKhoanController())->themmoitaikhoan(),

    'taikhoan-edit' => (new AdminTaiKhoanController())->lay1TaiKhoan($_GET['id']),

    'taikhoan-update' => (new AdminTaiKhoanController())->capnhattaikhoan(),



   
};
