<?php

class DashboardControllers
{
    public $login;
    public function __construct()
    {
        $this->login = new AdminLoginModel();
    }
    function dashboard()
    {
        if (!isset($_SESSION['user'])) {
            header("location:" . BASE_URL_ADMIN . "?act=addlogin");
            exit();
        }
        $title = 'clothes';
        $view = 'dashboard';
        require_once PATH_VIEW_ADMIN . 'layouts/master.php';
    }
    function addformlogin()
    {
        require_once PATH_VIEW_ADMIN . 'login/login.php';
        exit();
    }
    function login()
    {
        $getAllTaiKhoan = $this->login->getAllTaiKhoan();

        // echo '<pre>';
        // print_r($getAllTaiKhoan);
        // echo '</pre>';
        // exit();
        if (!isset($_SESSION['user'])) {
            if (empty($_POST['email']) || empty($_POST['password'])) {
                $_SESSION['loi'] = "Vui lòng nhập thông tin !!";
                header("location:" . BASE_URL_ADMIN);
                exit();
            }

            $email = $_POST['email'];
            $password = $_POST['password'];
            $isLoginSuccessful = false;
            // echo '<pre>';
            // print_r($_POST);
            // echo '</pre>';
            // exit();

            foreach ($getAllTaiKhoan as $key) {
                if ($email == $key["email"] && $password == $key["password"] && $key['id_vai_tro'] == 2) {
                    $_SESSION['user'] = $key['username'];
                    $_SESSION['img'] = $key['img'];
                    $isLoginSuccessful = true;
                    break;
                }
            }


            if ($isLoginSuccessful) {
                $this->dashboard();
            } else {
                $_SESSION['loi'] = "Tên đăng nhập hoặc mật khẩu không chính xác.";
                header("location:" . BASE_URL_ADMIN . "?act=addlogin");
            }
            header("location:" . BASE_URL_ADMIN . "?act=addlogin");
            exit();
        } else {
            $this->dashboard();
        }
    }
    function logout()
    {
        session_destroy();
        require_once PATH_VIEW_ADMIN . 'login/login.php';
        exit();
    }
}

?>

