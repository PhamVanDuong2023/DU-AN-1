<?php

class AdminTaiKhoanController
{
    public $TaiKhoan;
    public function __construct()
    {
        $this->TaiKhoan = new AdminTaiKhoanModel();
    }

    public function danhsachtaikhoan()
    {

        $listTaiKhoan = $this->TaiKhoan->getAlltaikhoan();




        $title = "danh sách tài khoản";

        $view = "tai_khoan/index";

        require_once PATH_VIEW_ADMIN . 'layouts/master.php';
    }

    public function xoataikhoan()
    {
        $id = $_GET['id'];
        echo $id;


        $this->TaiKhoan->deletetaikhoan($id);

        $listTaiKhoan = $this->TaiKhoan->getAlltaikhoan();

        $title = "delete taikhoan";

        $view = "tai_khoan/index";

        $_SESSION['thong_bao'] = "thao tác thành công";

        header('Location: ' . BASE_URL_ADMIN . "?act=taikhoan");
        exit();
    }

    public function addforminsert()
    {

        $title = "insert tai khoan";

        $view = "tai_khoan/insert";

        require_once PATH_VIEW_ADMIN . 'layouts/master.php';
        exit();
    }
    public function themmoitaikhoan()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . BASE_URL_ADMIN . "?act=taikhoan");
            exit();
        }
        $errors = [];

        // Validate and sanitize inputs
        $name = isset($_POST['name']) ? htmlspecialchars(trim($_POST['name'])) : '';
        $dia_chi = isset($_POST['dia_chi']) ? htmlspecialchars(trim($_POST['dia_chi'])) : '';
        $age = isset($_POST['age']) ? filter_var(trim($_POST['age']), FILTER_VALIDATE_INT) : '';
        $username = isset($_POST['username']) ? htmlspecialchars(trim($_POST['username'])) : '';
        $password = isset($_POST['password']) ? htmlspecialchars(trim($_POST['password'])) : '';
        $email = isset($_POST['email']) ? htmlspecialchars(trim($_POST['email'])) : '';
        $id_vai_tro = isset($_POST['vaitro']) ? htmlspecialchars(trim($_POST['vaitro'])) : '';

        // Validate required fields
        if (empty($name))
            $errors[] = "Tên không được để trống.";
        if (empty($dia_chi))
            $errors[] = "Địa chỉ không được để trống.";
        if (empty($age) || !$age)
            $errors[] = "Tuổi không hợp lệ.";
        if (empty($username))
            $errors[] = "Tên đăng nhập không được để trống.";
        if (empty($password))
            $errors[] = "Mật khẩu không được để trống.";
        if (empty($email))
            $errors[] = "Email không được để trống.";
        if (empty($id_vai_tro))
            $errors[] = "Vai trò không được để trống.";

        // Handle file upload
        $dir = "../img/"; // Image storage directory
        $img = null;

        if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
            $filename = basename($_FILES['img']['name']);
            $upload = $dir . uniqid() . '.' . strtolower(pathinfo($filename, PATHINFO_EXTENSION));
            $allowedTypes = ['jpg', 'png', 'jpeg', 'gif'];
            $maxFileSize = 5000000; // 5MB

            if (in_array(strtolower(pathinfo($filename, PATHINFO_EXTENSION)), $allowedTypes) && $_FILES['img']['size'] <= $maxFileSize) {
                if (move_uploaded_file($_FILES['img']['tmp_name'], $upload)) {
                    $img = $upload;
                } else {
                    $errors[] = "Không thể upload file.";
                }
            } else {
                $errors[] = "File không hợp lệ hoặc kích thước quá lớn.";
            }
        } elseif (isset($_FILES['img']) && $_FILES['img']['error'] != UPLOAD_ERR_OK) {
            $errors[] = "Có lỗi xảy ra trong quá trình upload file.";
        }

        // Redirect if there are errors
        if (!empty($errors)) {
            $_SESSION['loi'] = implode(' ', $errors);
            header('Location: ' . BASE_URL_ADMIN . "?act=taikhoan-insert");
            exit();
        }

        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert into the database
        $sbc = $this->TaiKhoan->insertTaiKhoan($name, $dia_chi, $age, $img, $username, $hashedPassword, $email, $id_vai_tro);

        if ($sbc) {
            $_SESSION['thong_bao'] = "Thao tác thành công";
            header('Location: ' . BASE_URL_ADMIN . "?act=taikhoan");
        } else {
            $_SESSION['loi'] = "Thao tác không thành công.";
            header('Location: ' . BASE_URL_ADMIN . "?act=taikhoan-insert");
        }
        exit();
    }

    public function lay1TaiKhoan($id)
    {
        // Sanitize and validate ID
        $id = intval($id);

        // Fetch user data
        try {
            $taikhoan1 = $this->TaiKhoan->showOneTaiKhoan($id);

            // Check if user data was retrieved successfully
            if ($taikhoan1 === false) {
                $_SESSION['loi'] = "Tài khoản không tồn tại.";
                header('Location: ' . BASE_URL_ADMIN . "?act=taikhoan");
                exit();
            }

            // Set view variables
            $title = "Cập nhật tài khoản";
            $view = "tai_khoan/update";

            // Include layout
            require_once PATH_VIEW_ADMIN . 'layouts/master.php';
        } catch (Exception $e) {
            $_SESSION['loi'] = "Lỗi: " . $e->getMessage();
            header('Location: ' . BASE_URL_ADMIN . "?act=taikhoan");
            exit();
        }
    }

    public function deltaiLkhachhang($id)
    {
        $id = intval($id);
        // echo "<pre>";
        // print_r($id);
        // exit();
        $TaiKhoan = $this->TaiKhoan->showOneTaiKhoan1($id);
        //   echo "<pre>";
        //   print_r($TaiKhoan);
        //   exit();
        $binhLuan = $this->TaiKhoan->getBinhLuanByTaiKhoanId($id);
        $title = "Chi tiết tài khoản";
        $view = "tai_khoan/chitiettaikhoan";
        require_once PATH_VIEW_ADMIN . 'layouts/master.php';
    }

    // Method to handle the update operation
    public function capnhattaikhoan()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
            $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
            $dia_chi = isset($_POST['dia_chi']) ? htmlspecialchars($_POST['dia_chi']) : '';
            $age = isset($_POST['age']) ? filter_var($_POST['age'], FILTER_VALIDATE_INT) : '';
            $username = isset($_POST['username']) ? htmlspecialchars($_POST['username']) : '';
            $password = isset($_POST['password']) ? htmlspecialchars($_POST['password']) : '';
            $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
            $id_vai_tro = isset($_POST['vaitro']) ? htmlspecialchars($_POST['vaitro']) : '';

            // Handle file upload
            $img = null;
            if (isset($_FILES['img']) && $_FILES['img']['error'] == UPLOAD_ERR_OK) {
                $dir = "../img/";
                $filename = basename($_FILES['img']['name']);
                $upload = $dir . $filename;
                $fileType = strtolower(pathinfo($upload, PATHINFO_EXTENSION));
                $allowedTypes = array('jpg', 'png', 'jpeg', 'gif');
                $maxFileSize = 5000000; // 5MB

                // Ensure the directory exists
                if (!is_dir($dir)) {
                    mkdir($dir, 0777, true);
                }

                // Validate file type and size
                if (in_array($fileType, $allowedTypes) && $_FILES['img']['size'] <= $maxFileSize) {
                    if (move_uploaded_file($_FILES['img']['tmp_name'], $upload)) {
                        $img = $upload;
                    } else {
                        $_SESSION['loi'] = "Không thể upload file.";
                        header('Location: ' . BASE_URL_ADMIN . "?act=taikhoan-update&id=" . $id);
                        exit();
                    }
                } else {
                    $_SESSION['loi'] = "File không hợp lệ hoặc kích thước quá lớn.";
                    header('Location: ' . BASE_URL_ADMIN . "?act=taikhoan-update&id=" . $id);
                    exit();
                }
            }
            echo $id;
            echo "<pre>";
            echo $name;
            echo "<pre>";
            echo $dia_chi;
            echo "<pre>";
            echo $age;
            echo "<pre>";
            echo $img;
            echo "<pre>";
            echo $username;
            echo "<pre>";
            echo $password;
            echo "<pre>";
            echo $email;
            echo "<pre>";
            echo $id_vai_tro;
            exit();
            // Update account information
            try {
                $result = $this->TaiKhoan->updateTaiKhoan($id, $name, $dia_chi, $age, $img, $username, $password, $email, $id_vai_tro);
                if ($result) {
                    $_SESSION['thong_bao'] = "Cập nhật tài khoản thành công.";
                } else {
                    $_SESSION['loi'] = "Có lỗi xảy ra khi cập nhật tài khoản.";
                }
            } catch (Exception $e) {
                $_SESSION['loi'] = "Lỗi: " . $e->getMessage();
            }

            // Redirect to the account list page
            header('Location: ' . BASE_URL_ADMIN . "?act=taikhoan");
            exit();
        } else {
            $_SESSION['loi'] = "Vui lòng nhập thông tin.";
            header('Location: ' . BASE_URL_ADMIN . "?act=taikhoan");
            exit();
        }
    }
}