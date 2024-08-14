<?php

class AdminSanPhamController
{
  public $modelSanPham;
  public $DanhMuc;

  public function __construct()
  {
    $this->modelSanPham = new AdminSanPhamModel();
    $this->DanhMuc = new AdminDanhMucModel();
    
  }

  public function danhSachsp(){
    // echo " đây là danh sách sản phẩm";
    $listsp = $this->modelSanPham->getAllSP();
    
    // var_dump($listsp);die();
    $title = "list danh sách";

    $view = "san_pham/index";
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
  }
//Thêm
  public function formAddsp(){
    $title = "list danh sách";
    $view = "san_pham/insert";
    $listdanhmuc = $this->DanhMuc->getAlldanhmuc();
     
      if (!empty($_POST)) {


        $name_sp = $_POST['name_sp'];
        $price_sp = $_POST['price_sp'];
        $soluong_sp = $_POST['soluong_sp'];
        $mota_sp = $_POST['mota_sp'];
        $img_sp = $_FILES['img_sp'];
        $id_danhmuc = $_POST['id_danhmuc'];
        $img = $img_sp;
        
        if (!empty($img) && $img['size'] > 0) {
            $img_sp = uploadFlie($img, 'uploads/');
        }
        $id_pro = $this->modelSanPham->insertSanPham($name_sp,$price_sp,$soluong_sp,$mota_sp,$img_sp,$id_danhmuc);
  
        $_SESSION['thong_bao'] = "thao tác thành công";
  
        $_SESSION['flash'] = true;
  
        header("location:" . BASE_URL_ADMIN . "?act=form-them-san-pham");
        exit();
  
      }
     require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
//Xóa
public function xoasp($id)
{

      $this->modelSanPham->deletesp($id);
      
      $_SESSION['thong_bao'] = "thao tác thành công";

      header('Location: ' . BASE_URL_ADMIN . "?act=sanpham");

      exit();
   
  
}
public function capnhatsanpham($id){
  // echo " đây là danh sách sản phẩm";
  $sp = $this->modelSanPham->getOneSP($id);
  //  var_dump($sp);die();
  $listdanhmuc = $this->DanhMuc->getAlldanhmuc();
  // var_dump($listsp);die();
  $title = "list danh sách";

  $view = "san_pham/update";
  if (!empty($_POST)) {
    $name_sp = $_POST['name_sp']??$sp['name_sp'];
    $price_sp = $_POST['price_sp']??$sp['price_sp'];
    $soluong_sp = $_POST['soluong_sp']??$sp['soluong_sp'];
    $mota_sp = $_POST['mota_sp']??$sp['mota_sp'];
    $img_sp = $_FILES['img_sp'];
    $id_danhmuc = $_POST['id_danhmuc']??$sp['id_danhmuc'];
    $img = $img_sp;
    
    if (!empty($img) && $img['size'] > 0) {
        $img_sp = uploadFlie($img, '../../uploads/');
    }else{
      $img_sp = $sp['img_sp'];
    }
    
    $this->modelSanPham->updatesp($name_sp,$price_sp,$soluong_sp,$mota_sp,$img_sp,$id_danhmuc,$id);
    
    $_SESSION['thong_bao'] = "thao tác thành công";

    $_SESSION['flash'] = true;

    header("location:" . BASE_URL_ADMIN . "?act=sanpham-edit&id=".$id);
    exit();

  }
  require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
}