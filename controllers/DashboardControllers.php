<?php
class DashboardControllers
{
    function home()
    {
        $title = 'clothes';
        $view = 'home';
        require_once PATH_VIEW . 'layouts/master.php';
    }
    function info()
    {
        $title = 'thông tin khách hàng';
        require_once PATH_VIEW . 'info/index.php';
        exit();
    }
    function lienhe()
    {
        $title = 'liên hệ';
        require_once PATH_VIEW . 'lien_he/index.php';
        exit();
    }
}
?>