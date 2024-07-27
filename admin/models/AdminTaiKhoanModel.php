<?php
class AdminTaiKhoanModel
{
    public $conn;
    public function __construct()
    {
        $this->conn = connect_DB();
    }
    public function getAlltaikhoan()
    {
        try {
            $sql = "SELECT * FROM `tai_khoan` INNER JOIN `vai_tro` ON `tai_khoan`.`id_vaitro`=`vai_tro`.`id_vaitro`";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchALl();
        } catch (Exception $e) {
            echo 'lỗi' . $e->getMessage();
        }
    }

    public function deleteTaiKhoan($id)
    {
        try {
            $sql = "DELETE FROM tai_khoan WHERE `tai_khoan`.`id` = $id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchALl();
        } catch (Exception $e) {
            echo 'lỗi' . $e->getMessage();
        }
    }
    public function insertTaiKhoan($name, $dia_chi, $age, $img, $username, $password, $id_vaitro)
    {
        try {

            $sql = "INSERT INTO `tai_khoan`( `name`, `dia_chi`, `age`, `img`, `username`, `password`, `id_vaitro`) VALUES ('$name','$dia_chi','$age','$img','$username','$password','$id_vaitro')";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();
        } catch (Exception $e) {
            echo 'Lỗi' . $e->getMessage();
        }
    }

    public function showOneTaiKhoan($id)
    {
        try {
            $sql = "SELECT `id`, `name`, `dia_chi`, `age`, `img`, `username`, `password`, `id_vaitro` 
                    FROM `tai_khoan` WHERE `id` = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(); // Return user data as an associative array
        } catch (PDOException $e) {
            error_log('Database error: ' . $e->getMessage());
            return false;
        }
    }

    // Method to update user account details
    public function updateTaiKhoan($id, $name, $dia_chi, $age, $img, $username, $password, $id_vaitro)
    {
        try {
            // Prepare the SQL statement with placeholders
            $sql = "UPDATE `tai_khoan` SET `name`='$name',`dia_chi`='$dia_chi',`age`='$age',`img`='$img',`username`='$username',`password`='$password',`id_vaitro`='$id_vaitro'
             WHERE id=".$id;
            $stmt = $this->conn->prepare($sql);
            // Execute the query
            $stmt->execute();
            
        } catch (PDOException $e) {
            error_log('Database error: ' . $e->getMessage());
            return false;
        }
    }

    

    public function __distruct()
    {
        $this->conn = disconnect_DB();
    }
}
