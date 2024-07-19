<?php

class DashboardControllers
{
    function home()
    {
        $title = 'clothes';
        $view = 'home';
        require_once PATH_VIEW . 'layouts/master.php';
    }
}

?>