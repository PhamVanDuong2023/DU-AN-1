<?php

class AdminDanhMucModel
{
   public $conn;

   public function __construct()
   {
      $this->conn = connect_DB();
   }
   public function getAlldanhmuc()
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

   public function deleteDanhmuc($id)
   {
      try {

         $sql = "DELETE FROM `danh_muc` WHERE id=" . $id;

         $stmt = $this->conn->prepare($sql);

         $stmt->execute();

      } catch (Exception $e) {
         echo 'Lỗi' . $e->getMessage();
      }
   }

   public function insertDanhmuc($name_danhmuc)
   {
      try {

         $sql = "INSERT INTO `danh_muc`(`name_danhmuc`) VALUES ('$name_danhmuc')";

         $stmt = $this->conn->prepare($sql);

         $stmt->execute();

      } catch (Exception $e) {
         echo 'Lỗi' . $e->getMessage();
      }
   }

   public function showOneDanhmuc($id)
   {
      try {

         $sql = "SELECT `id`, `name_danhmuc` FROM `danh_muc` WHERE id=" . $id;

         $stmt = $this->conn->prepare($sql);

         $stmt->execute();

         return $stmt->fetch();

      } catch (Exception $e) {
         echo 'Lỗi' . $e->getMessage();
      }

   }

   public function updateDanhMuc($id, $name_danhmuc)
   {
      try {

         $sql = "UPDATE `danh_muc` SET `name_danhmuc`='$name_danhmuc' WHERE id=" . $id;

         $stmt = $this->conn->prepare($sql);

         $stmt->execute();

      } catch (Exception $e) {
         echo 'Lỗi' . $e->getMessage();
      }
   }

   public function __distruct()
   {
      $this->conn = disconnect_DB();
   }
}