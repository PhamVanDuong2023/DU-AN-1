<?php


class AdminBinhLuanController
{

  public $Binhluan;
  public function __construct()
  {
    $this->Binhluan = new AdminBinhLuanModel();
  }

  public function danhsachbinhluan()
  {

    $listbinhluan = $this->Binhluan->getAllbinhluan();

    $title = "danh sách bình luận";

    $view = "binh_luan/index";

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
  }


  public function xoabinhluan($id)
  {
      // Xóa bình luận
      $isDeleted = $this->Binhluan->deletebinhluan($id);
  
      // Kiểm tra kết quả xóa
      if ($isDeleted) {
          $_SESSION['thong_bao'] = "Xóa bình luận thành công.";
      } else {
          $_SESSION['loi'] = "Không thể xóa bình luận hoặc bình luận không tồn tại.";
      }
  
      // Cập nhật danh sách bình luận sau khi xóa
      $listbinhluan = $this->Binhluan->getAllbinhluan();
  
      $title = "Quản lý Bình luận";
      $view = "binh_luan/index";
  
      // Chuyển hướng về trang danh sách bình luận
      header('Location: ' . BASE_URL_ADMIN . "?act=binhluan");
      exit();
  }
}
  
  ?>