<?php
class ClientThanhToanModel
{
   public $conn;

   public function __construct()
   {
      $this->conn = connect_DB();
   }
   public function getOneTK($id)
   {
      try {
         $sql = "SELECT * FROM `tai_khoan` WHERE id=" . $id;

         $stmt = $this->conn->prepare($sql);

         $stmt->execute();

         return $stmt->fetch();

      } catch (Exception $e) {
         echo 'Lỗi' . $e->getMessage();
      }
   }
   function getPhuongThucTT() {
      try {
         $sql = "SELECT * FROM `phuong_thu_thanh_toan`";

         $stmt = $this->conn->prepare($sql);

         $stmt->execute();

         return $stmt->fetchAll();

      } catch (Exception $e) {
         echo 'Lỗi' . $e->getMessage();
      }
   }
}
?>