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

    $this->DanhMuc->deleteDanhmuc($id);

    $listDanhMuc = $this->DanhMuc->getAlldanhmuc();

    $title = "delete danh mục";

    $view = "danh_muc/index";

    $_SESSION['thong_bao'] = "thao tác thành công";

    header('Location: ' . BASE_URL_ADMIN . "?act=danhmuc");
    exit();
  }

  public function themmoidanhmuc()
  {

    if (isset($_POST['name_danhmuc']) && $_POST['name_danhmuc']) {


      $name_danhmuc = $_POST['name_danhmuc'];

      $this->DanhMuc->insertDanhmuc($name_danhmuc);

      $_SESSION['thong_bao'] = "thao tác thành công";

      header('Location: ' . BASE_URL_ADMIN . "?act=danhmuc-insert");

      exit();

    } else {
      $_SESSION['loi'] = "vui lòng nhập thông tin";
      
    }
    $title = "insert danh mục";

    $view = "danh_muc/insert";

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';

  }

  public function lay1Danhmuc($id) {

    $danhmuc1 = $this->DanhMuc->showOneDanhmuc($id);

    $title = "lấy 1 danh sách";

    $view = "danh_muc/update";

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
  }

  public function capnhatdanhmuc() {
    
    $id = $_POST['id'];

    $name_danhmuc = $_POST['name_danhmuc'];

    $this->DanhMuc-> updateDanhMuc($id,$name_danhmuc);

    $_SESSION['thong_bao'] = "thao tác thành công";

    $title = "update danh sách";

    header('Location: ' . BASE_URL_ADMIN . "?act=danhmuc");
    
    exit();

  }

}
?>