<?php

class AuthenControllers
{
    public $authen;

    public function __construct()
    {
       $this->authen = new Authen();
    }
 public function login(){
    if(!empty($_POST)){
        $username = $_POST['username'];
        $password = $_POST['password']; 
        $user = $this->authen->getTaiKhoanByUsernameAndPassword($username, $password); 
        if(empty($user)){
            $_SESSION['loi'] = 'Tài khoản hoặc mật khẩu không chính xác';

            header('Location: ' . BASE_URL . "?act=login");
            exit();
        }else{
            $_SESSION['user'] = $user;
            header('Location: ' . BASE_URL);

            exit();
        }

    }


    require_once PATH_VIEW . 'authen/login.php';
 }
 public function logout(){
    session_destroy();
    header('Location: ' . BASE_URL );
    exit();
}
public function signup(){
    if(!empty($_POST)){
        $username = $_POST['username'];
        $password = $_POST['password']; 
        $email = $_POST['email'];
        $repassword = $_POST['repassword'];
        if($password != $repassword){
            $err[] = 'Nhập lại mật khẩu ';
        }
        if(empty($username) || empty($email) || empty($repassword)){
            $err[] = 'Bạn cần nhập dữ liệu tất cả các trường';
        }
        if(!empty($this->authen->checkEmail($email))){
            $err[] = 'Email đã tồn tại';
        }
        if(!empty($this->authen->checkUsername($username))){
            $err[] = 'Username đã tồn tại';
        }
        if(!empty($err)){
            $_SESSION['loi'] = $err;
            header('Location: ' . BASE_URL. '?act=signup' );
            exit();
        }
        $this->authen->insertTaiKhoan($email,$username,$password);
        $_SESSION['thanhcong'] = 'Bạn đã đăng ký thành công';
        header('Location: ' . BASE_URL. '?act=signup' );
        exit();


  
 }
 require_once PATH_VIEW . 'authen/signup.php';
}
}