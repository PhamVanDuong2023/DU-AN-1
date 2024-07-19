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

// // điều hướng
$act= $_GET['act'] ?? '/';
match($act){
    '/' =>(new DashboardControllers())->home(),
};

?>