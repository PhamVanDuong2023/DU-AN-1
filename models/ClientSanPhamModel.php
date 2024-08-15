<?php
class ClientSanPhamModel
{
   public $conn;
   public function __construct()
   {
      $this->conn = connect_DB();
   }
   public function get8SanPham()
   {
      try {
         $sql = "SELECT * FROM `san_pham` limit 8";

         $stmt = $this->conn->prepare($sql);

         $stmt->execute();

         return $stmt->fetchAll();

      } catch (Exception $e) {
         echo 'Lỗi' . $e->getMessage();
      }
   }
   public function get8DanhMuc()
   {
      try {
         $sql = "SELECT * FROM `danh_muc`";

         $stmt = $this->conn->prepare($sql);

         $stmt->execute();

         return $stmt->fetchAll();

      } catch (Exception $e) {
         echo 'Lỗi' . $e->getMessage();
      }
   }
   public function get1SanPham($id)
   {
      try {
         $sql = "SELECT * FROM `san_pham` WHERE id=" . $id;

         $stmt = $this->conn->prepare($sql);

         $stmt->execute();

         return $stmt->fetch();

      } catch (Exception $e) {
         echo 'Lỗi' . $e->getMessage();
      }
   }

   public function getSoLuong($id)
   {
      try {
         $sql = "SELECT soluong_sp FROM `san_pham` WHERE id=" . $id;

         $stmt = $this->conn->prepare($sql);

         $soluong = $stmt->execute();

         $soluong = $stmt->fetch(PDO::FETCH_ASSOC);
         
         return $soluong['soluong_sp'];

      } catch (Exception $e) {
         echo 'Lỗi' . $e->getMessage();
      }
   }
   public function updateSoLuong($id, $new_soluong)
   {
      try {
         $sql = "UPDATE `san_pham` SET `soluong_sp`='$new_soluong' WHERE id=" . $id;

         $stmt = $this->conn->prepare($sql);

         $stmt->execute();

      } catch (Exception $e) {
         echo 'Lỗi' . $e->getMessage();
      }
   }



}
?>