<?php

class AdminLoginModel
{
    public $conn;

    public function __construct()
    {
       $this->conn = connect_DB();
    }
    public function getAllTaiKhoan()
    {
       try {
          $sql = "SELECT * FROM `tai_khoan`";
 
          $stmt = $this->conn->prepare($sql);
 
          $stmt->execute();
 
          return $stmt->fetchAll();
 
       } catch (Exception $e) {
          echo 'Lỗi' . $e->getMessage();
       }
    }
}

?>