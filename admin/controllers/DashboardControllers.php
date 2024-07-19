<?php

class DashboardControllers{
    function dashboard(){
        $title = 'clothes';
        $view = 'dashboard';
        require_once PATH_VIEW_ADMIN . 'layouts/master.php';
    }
}

?>