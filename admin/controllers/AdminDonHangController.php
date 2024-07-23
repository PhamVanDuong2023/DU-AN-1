<?php
 class AdminDonHangController {
    public $modeldonhang;

   public function __construct()
   {
      $this->modeldonhang = new AdminDonHangModel();
   }
   public function danhsachDonHang() {

    $listDonHang = $this->modeldonhang->getAlldonhang();

    $title = "list đơn hàng";

    $view = "don_hang/index";

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';

   }
 }

?>