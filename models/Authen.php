<?php

class Authen
{
    public $conn;

    public function __construct()
    {
       $this->conn = connect_DB();
    }
    public function getTaiKhoanByUsernameAndPassword($username,$password)
    {
       try {
          $sql = "SELECT * FROM `tai_khoan` WHERE `username`='$username' AND `password`='$password' AND id_vai_tro = 1";
 
          $stmt = $this->conn->prepare($sql);
 
          $stmt->execute();
 
          return $stmt->fetch();
 
       } catch (Exception $e) {
          echo 'Lỗi' . $e->getMessage();
       }
    }
   //  
   public function insertTaiKhoan($email,$username,$password)
   {
      try {
         $sql = "INSERT INTO `tai_khoan`(  `username`, `password`, `email`, `id_vai_tro`) VALUES ('$username','$password','$email',1)";

         $stmt = $this->conn->prepare($sql);

         $stmt->execute();


      } catch (Exception $e) {
         echo 'Lỗi' . $e->getMessage();
      }
   }
   public function checkEmail($email)
   {
      try {
         $sql = "SELECT * FROM `tai_khoan` WHERE email = '$email'";

         $stmt = $this->conn->prepare($sql);

         $stmt->execute();

         return $stmt->fetch();

      } catch (Exception $e) {
         echo 'Lỗi' . $e->getMessage();
      }
   }
   public function checkUsername($username)
   {
      try {
         $sql = "SELECT * FROM `tai_khoan` WHERE username = '$username'";

         $stmt = $this->conn->prepare($sql);

         $stmt->execute();

         return $stmt->fetch();

      } catch (Exception $e) {
         echo 'Lỗi' . $e->getMessage();
      }
   }
}

?>