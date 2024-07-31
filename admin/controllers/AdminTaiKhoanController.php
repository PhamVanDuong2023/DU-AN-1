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


  public function xoataikhoan($id)
  {

    $this->TaiKhoan->deletetaikhoan($id);

    $listTaiKhoan = $this->TaiKhoan->getAlltaikhoan();

    $title = "delete taikhoan";

    $view = "tai_khoan/index";

    $_SESSION['thong_bao'] = "thao tác thành công";

    header('Location: ' . BASE_URL_ADMIN . "?act=taikhoan");
    exit();
  }

  public function addforminsert(){
    $title = "insert tai khoan";

    $view = "tai_khoan/insert";

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
    exit();
  }
  public function themmoitaikhoan()
  {
      // Check if form is submitted
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          // Initialize an array to store errors
          $errors = [];
  
          // Validate and sanitize inputs
          $name = isset($_POST['name']) ? htmlspecialchars(trim($_POST['name'])) : '';
          $dia_chi = isset($_POST['dia_chi']) ? htmlspecialchars(trim($_POST['dia_chi'])) : '';
          $age = isset($_POST['age']) ? filter_var(trim($_POST['age']), FILTER_VALIDATE_INT) : '';
          $username = isset($_POST['username']) ? htmlspecialchars(trim($_POST['username'])) : '';
          $password = isset($_POST['password']) ? htmlspecialchars(trim($_POST['password'])) : '';
          $id_vaitro = isset($_POST['vaitro']) ? htmlspecialchars(trim($_POST['vaitro'])) : '';
  
          // Check if any required fields are empty
          if (empty($name)) {
              $errors[] = "Tên không được để trống.";
          }
          if (empty($dia_chi)) {
              $errors[] = "Địa chỉ không được để trống.";
          }
          if (empty($age) || !$age) {
              $errors[] = "Tuổi không hợp lệ.";
          }
          if (empty($username)) {
              $errors[] = "Tên đăng nhập không được để trống.";
          }
          if (empty($password)) {
              $errors[] = "Mật khẩu không được để trống.";
          }
          if (empty($id_vaitro)) {
              $errors[] = "Vai trò không được để trống.";
          }
  
          // File upload settings
          $dir = "../img/"; // Image storage directory
          $filename = isset($_FILES['img']['name']) ? basename($_FILES['img']['name']) : '';
          $upload = $dir . $filename;
          $fileType = strtolower(pathinfo($upload, PATHINFO_EXTENSION));
          $allowedTypes = array('jpg', 'png', 'jpeg', 'gif');
          $maxFileSize = 5000000; // 5MB
  
          // Ensure the directory exists
          if (!is_dir($dir)) {
              mkdir($dir, 0777, true); // Create the directory if it doesn't exist
          }
  
          // Check file upload error
          if (isset($_FILES['img']) && $_FILES['img']['error'] != UPLOAD_ERR_OK) {
              $errors[] = "Có lỗi xảy ra trong quá trình upload file.";
          }
  
          // Validate file type and size
          if ($filename && in_array($fileType, $allowedTypes) && $_FILES['img']['size'] <= $maxFileSize) {
              $uniqueFilename = uniqid() . '.' . $fileType;
              $upload = $dir . $uniqueFilename;
  
              // Move file to the target directory
              if (!move_uploaded_file($_FILES['img']['tmp_name'], $upload)) {
                  $errors[] = "Không thể upload file.";
              } else {
                  $img = $upload; // If upload is successful, assign path to $img
              }
          } elseif ($filename) {
              $errors[] = "File không hợp lệ hoặc kích thước quá lớn.";
          }
  
          // If there are errors, redirect back with error messages
          if (!empty($errors)) {
              $_SESSION['loi'] = implode(' ', $errors);
              header('Location: ' . BASE_URL_ADMIN . "?act=taikhoan");
              exit();
          }
  
          // Hash the password before storing
          $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
  
          // Insert into the database
          $sbc = $this->TaiKhoan->insertTaiKhoan($name, $dia_chi, $age, isset($img) ? $img : null, $username, $password, $id_vaitro);
  
          if ($sbc) {
              $_SESSION['thong_bao'] = "Thao tác thành công";
              header('Location: ' . BASE_URL_ADMIN . "?act=taikhoan");
          } else {
              $_SESSION['loi'] = "Thao tác không thành công.";
              header('Location: ' . BASE_URL_ADMIN . "?act=taikhoan");
          }
          exit();
      } else {
          $_SESSION['loi'] = "Yêu cầu không hợp lệ.";
          header('Location: ' . BASE_URL_ADMIN . "?act=taikhoan");
          exit();
      }
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

  // Method to handle the update operation
  public function capnhattaikhoan()
  {
    //   // Check and sanitize POST data
    //   $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
    //   $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
    //   $dia_chi = isset($_POST['dia_chi']) ? htmlspecialchars($_POST['dia_chi']) : '';
    //   $age = isset($_POST['age']) ? intval($_POST['age']) : 0;
    //   $username = isset($_POST['username']) ? htmlspecialchars($_POST['username']) : '';
    //   $password = isset($_POST['password']) ? htmlspecialchars($_POST['password']) : '';
    //   $id_vaitro = isset($_POST['vaitro']) ? intval($_POST['vaitro']) : 0;

    //   // Handle file upload
    //   $img = ''; // Default to an empty string or previous image if no new upload
    //   if (isset($_FILES['img']) && $_FILES['img']['error'] == UPLOAD_ERR_OK) {
    //       $dir = "../img/";
    //       $filename = basename($_FILES['img']['name']);
    //       $upload = $dir . $filename;

    //       if (move_uploaded_file($_FILES['img']['tmp_name'], $upload)) {
    //           $img = $upload;
    //       } else {
    //           $_SESSION['loi'] = "Lỗi: Không thể tải lên tệp.";
    //           header('Location: ' . BASE_URL_ADMIN . "?act=taikhoan-update&id=".$id);
    //           exit();
    //       }
    //   }
    //   //Update user data
    //   try {
    //       $UD = $this->TaiKhoan->updateTaiKhoan($id, $name, $dia_chi, $age, $img, $username, $password, $id_vaitro);
    //       if ($UD) {
    //           $_SESSION['thovg_bao'] = "Thao tác thành công";
    //       } else {
    //           $_SESSION['loi'] = "Có lỗi xảy ra khi cập nhật tài khoản";
    //       }
    //   } catch (Exception $e) {
    //       $_SESSION['loi'] = "Lỗi: " . $e->getMessage();
    //   }

    //   // Redirect to the account list page
    //   header('Location: ' . BASE_URL_ADMIN . "?act=taikhoan");
    //   exit();


    if (isset($_POST['name']) && !empty($_POST['name'])) {
        // Validate and sanitize inputs
        $id = $_POST['id'];
        $name = htmlspecialchars($_POST['name']);
        $dia_chi = htmlspecialchars($_POST['dia_chi']);
        $age = filter_var($_POST['age'], FILTER_VALIDATE_INT);
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);
        $id_vaitro = htmlspecialchars($_POST['vaitro']);
        


        // File upload settings
        $dir = "../img/"; // Image storage directory
        $filename = basename($_FILES['img']['name']);
        $upload = $dir . $filename;
        $fileType = strtolower(pathinfo($upload, PATHINFO_EXTENSION));
        $allowedTypes = array('jpg', 'png', 'jpeg', 'gif');

        // Ensure the directory exists
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true); // Create the directory if it doesn't exist
        }

        // Validate file type and size
        if (in_array($fileType, $allowedTypes) && $_FILES['img']['size'] <= 5000000000000000) {
            // Move file to the target directory
            if (move_uploaded_file($_FILES['img']['tmp_name'], $upload)) {
                $img = $upload; // If upload is successful, assign path to $img
            } else {
                $_SESSION['loi'] = "Không thể upload file.";
                header('Location: ' . BASE_URL_ADMIN . "?act=taikhoan");
                exit();
            }
        } else {
            $_SESSION['loi'] = "File không hợp lệ hoặc kích thước quá lớn.";
            header('Location: ' . BASE_URL_ADMIN . "?act=taikhoan");
            exit();
        }

        // Insert into the database
        $this->TaiKhoan->updateTaiKhoan($id, $name, $dia_chi, $age, $img, $username, $password, $id_vaitro);
        header('Location: ' . BASE_URL_ADMIN . "?act=taikhoan");
        // if ($sbc) {
        //     $_SESSION['thong_bao'] = "Thao tác thành công";
        //     header('Location: ' . BASE_URL_ADMIN . "?act=taikhoan");
        // } else {
        //     $_SESSION['loi'] = "Thao tác không thành công.";
        //     header('Location: ' . BASE_URL_ADMIN . "?act=taikhoan");
        // }
        // exit();
    } else {
        $_SESSION['loi'] = "Vui lòng nhập thông tin.";
        header('Location: ' . BASE_URL_ADMIN . "?act=taikhoan");
        exit();
  }
}
}