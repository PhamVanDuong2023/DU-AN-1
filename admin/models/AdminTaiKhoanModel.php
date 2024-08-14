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
            $sql = "SELECT tai_khoan.*, vai_tro.name AS name_vaitro, vai_tro.id as id_vaitro 
                    FROM tai_khoan 
                    INNER JOIN vai_tro 
                    ON tai_khoan.id_vai_tro = vai_tro.id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchALl();
        } catch (Exception $e) {
            echo 'lỗi' . $e->getMessage();
        }
    }

    public function deletetaikhoan($id)
    {
        try {
            $sql = "DELETE FROM tai_khoan WHERE id =".$id;

            $stmt = $this->conn->prepare($sql);
            // $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

        } catch (PDOException $e) {
            error_log('Database error: ' . $e->getMessage());
            return false;
        }
        // return true;
    }

    public function insertTaiKhoan($name, $dia_chi, $age, $img, $username, $password, $email, $id_vai_tro)
    {
        try {

            $sql = "INSERT INTO `tai_khoan`( `name`, `dia_chi`, `age`, `img`, `username`, `password`,`email`, `id_vai_tro`) VALUES ('$name','$dia_chi','$age','$img','$username','$password','$email','$id_vai_tro')";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();
        } catch (Exception $e) {
            echo 'Lỗi' . $e->getMessage();
        }
    }

    public function showOneTaiKhoan($id)
    {
        try {
            $sql = "SELECT `id`, `name`, `dia_chi`, `age`, `img`, `username`, `password`,`email`, `id_vai_tro` 
                    FROM `tai_khoan` WHERE `id` = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(); 
        } catch (PDOException $e) {
            error_log('Database error: ' . $e->getMessage());
            return false;
        }
    }
    public function showOneTaiKhoan1($id)
    {
        try {
            $sql = "SELECT tai_khoan.*, vai_tro.name as name_vaitro
            FROM tai_khoan 
            INNER JOIN vai_tro ON tai_khoan.id_vai_tro = vai_tro.id
            WHERE tai_khoan.id = :id";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $e) {
            error_log('Database error: ' . $e->getMessage());
            return false;
        }
    }

    public function getBinhLuanByTaiKhoanId($id)
    {
        try {
            $query = "SELECT * FROM binh_luan WHERE id_taikhoan = :id_taikhoan";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id_taikhoan', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log('Database error: ' . $e->getMessage());
            return [];
        }
    }

    // Method to update user account details
    public function updateTaiKhoan($id, $name, $dia_chi, $age, $img, $username, $password, $email, $id_vai_tro)
    {
        try {
            // Prepare the SQL statement with placeholders
            $sql = "UPDATE `tai_khoan` SET `name`='$name',`dia_chi`='$dia_chi',`age`='$age',`img`='$img',`username`='$username',`password`='$password',`email`='$email',`id_vai_tro`='$id_vai_tro'
             WHERE id=" . $id;

            $stmt = $this->conn->prepare($sql);
            // Execute the query
            $stmt->execute();

        } catch (PDOException $e) {
            error_log('Database error: ' . $e->getMessage());
            return false;
        }
    }
}