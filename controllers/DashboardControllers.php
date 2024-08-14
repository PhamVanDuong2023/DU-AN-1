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

    function thanhtoan()
    {
        $title = 'thanh toán';
        require_once PATH_VIEW . 'thanh_toan/index.php';
        exit();
    }

    public $login;

    public function __construct()
    {
        $this->login = new LoginModel();
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


        if (!isset($_SESSION['user'])) {
            if (empty($_POST['email']) || empty($_POST['password'])) {
                $_SESSION['loi'] = "Vui lòng nhập thông tin !!";
                header("location:" . BASE_URL_ADMIN);
                exit();
            }

            $email = $_POST['email'];
            $password = $_POST['password'];
            $isLoginSuccessful = false;

            foreach ($getAllTaiKhoan as $key) {
                if ($email == $key["email"] && $password == $key["password"] && $key['id_vai_tro'] == 1) {
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