<?php
class AdminDonHangController
{
   public $modeldonhang;

   public function __construct()
   {
      $this->modeldonhang = new AdminDonHangModel();
   }
   public function danhsachDonHang()
   {

      $listDonHang = $this->modeldonhang->getAlldonhang();

      $title = "list đơn hàng";

      $view = "don_hang/index";

      require_once PATH_VIEW_ADMIN . 'layouts/master.php';

   }

   public function chitietDonHang()
   {

      $don_hang_id = $_GET['id_don_hang'];

      // lấy thông tin đơn hàng ở bảng don_hang
      $don_hang = $this->modeldonhang->getDetailDonHang($don_hang_id);

      // lấy danh sách sản phẩm đã đặt của đơn hàng ở bảng chi_tiet_don_hang
      $sanPhamDonHang = $this->modeldonhang->getListSpDonHang($don_hang_id);

      $listTrangThaiDonHang = $this->modeldonhang->getAllTrangThaiDonHang();
      // echo "<pre>";
      // print_r($listTrangThaiDonHang);
      // exit();

      $title = "chi tiết đơn hàng";

      $view = "don_hang/chitietdonhang";

      require_once PATH_VIEW_ADMIN . 'layouts/master.php';
   }

   public function editDonHang($id)
   {
      // $id = $_GET['id'];

      $donHang1 = $this->modeldonhang->getDetailDonHang($id);

      $donhangAll = $this->modeldonhang->getAlldonhang();

      $trangThaiAll = $this->modeldonhang->getAlltrangThai();

      $title = "lấy 1 đơn hàng";

      $view = "don_hang/update";

      require_once PATH_VIEW_ADMIN . 'layouts/master.php';
   }

   public function capnhatDonHang()
   {

      $id = $_POST['id'];

      $trang_thai_id = $_POST['trang_thai_id'];

      $this->modeldonhang->updateDonHang($id, $trang_thai_id);

      $_SESSION['thong_bao'] = "thao tác thành công";

      header('Location: ' . BASE_URL_ADMIN . "?act=don-hang");
   }
}
?>