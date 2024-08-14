<?php

class AdminDanhMucController
{

  public $DanhMuc;
  public function __construct()
  {
    $this->DanhMuc = new AdminDanhMucModel();
  }

  public function danhsachdanhmuc()
  {

    $listDanhMuc = $this->DanhMuc->getAlldanhmuc();


    $title = "list danh sách";

    $view = "danh_muc/index";


    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
  }


  public function xoadanhmuc($id)
  {
    $flag = false;



    if ($this->DanhMuc->deleteDanhmuc($id)) {
      $flag = true;
      $listDanhMuc = $this->DanhMuc->getAlldanhmuc();

      $title = "delete danh mục";

      $view = "danh_muc/index";

      $_SESSION['thong_bao'] = "thao tác thành công";
    }else{
      $_SESSION['loi'] = "Danh mục này có sản phẩm !!!";
    }


    header('Location: ' . BASE_URL_ADMIN . "?act=danhmuc");
    exit();
  }
  public function addform()
  {
    $title = "insert danh mục";

    $view = "danh_muc/insert";

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';

    // deleteSession();
  }

  public function themmoidanhmuc()
  {

    if (isset($_POST['name_danhmuc']) && $_POST['name_danhmuc']) {


      $name_danhmuc = $_POST['name_danhmuc'];

      $this->DanhMuc->insertDanhmuc($name_danhmuc);

      $_SESSION['thong_bao'] = "thao tác thành công";

      $_SESSION['flash'] = true;

      header("location:" . BASE_URL_ADMIN . "?act=danhmuc-add-form-insert");
      exit();

    } else {


      $_SESSION['loi'] = "vui lòng nhập thông tin";


      $_SESSION['flash'] = true;

      header("location:" . BASE_URL_ADMIN . "?act=danhmuc-add-form-insert");
      exit();
    }


  }

  public function lay1Danhmuc($id)
  {

    $danhmuc1 = $this->DanhMuc->showOneDanhmuc($id);

    $title = "lấy 1 danh sách";

    $view = "danh_muc/update";

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
  }

  public function capnhatdanhmuc()
  {

    if (isset($_POST['name_danhmuc']) && $_POST['name_danhmuc']) {

      $id = $_POST['id'];

      $name_danhmuc = $_POST['name_danhmuc'];

      $this->DanhMuc->updateDanhMuc($id, $name_danhmuc);

      $_SESSION['thong_bao'] = "thao tác thành công";


      header('Location: ' . BASE_URL_ADMIN . "?act=danhmuc");

      exit();



    } else {
      $id = $_POST['id'];
      $_SESSION['loi'] = "vui lòng nhập thông tin";
      header("location:" . BASE_URL_ADMIN . "?act=danhmuc-edit&id=" . $id);

      exit();
    }

  }

}
?>