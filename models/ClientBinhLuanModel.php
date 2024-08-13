<?php
class ClientBinhLuanModel
{
   public $conn;
   public function __construct()
   {
      $this->conn = connect_DB();
   }
   public function getAllBinhLuan()
   {
      try {
         $sql = "SELECT * FROM `binh_luan`";

         $stmt = $this->conn->prepare($sql);

         $stmt->execute();

         return $stmt->fetchAll();

      } catch (Exception $e) {
         echo 'Lỗi' . $e->getMessage();
      }
   }
   public function insertBinhluan($noi_dung, $id_taikhoan, $id_sp, $ngay_bl)
   {
      try {

         $sql = "INSERT INTO `binh_luan`(`noi_dung`, `id_taikhoan`, `id_sp`, `ngay_bl`) VALUES ('$noi_dung','$id_taikhoan','$id_sp','$ngay_bl')";

         $stmt = $this->conn->prepare($sql);

         $stmt->execute();

      } catch (Exception $e) {
         echo 'Lỗi' . $e->getMessage();
      }
   }
   public function getBinhLuanTheoSp($id)
   {
      try {

         $sql = "SELECT * FROM `binh_luan` WHERE id_sp=" . $id;

         $stmt = $this->conn->prepare($sql);

         $stmt->execute();

         return $stmt->fetchAll();

      } catch (Exception $e) {
         echo 'Lỗi' . $e->getMessage();
      }
   }
}
?>