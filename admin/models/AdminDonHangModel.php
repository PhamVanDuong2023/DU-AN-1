<?php
class AdminDonHangModel
{
    public $conn;
    public function __construct()
    {
        $this->conn = connect_DB();
    }
    public function getAlldonhang()
    {
        try {
            $sql = "SELECT don_hang.*, trang_thai.id AS id_tt, trang_thai.ten_trang_thai 
                        FROM don_hang 
                        INNER JOIN trang_thai ON don_hang.trang_thai_id = trang_thai.id";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();

        } catch (Exception $e) {
            echo 'Lỗi' . $e->getMessage();
        }
    }

    public function getAllTrangThaiDonHang()
    {
        try {
            $sql = "SELECT * FROM trang_thai";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();

        } catch (Exception $e) {
            echo 'Lỗi' . $e->getMessage();
        }
    }
    public function getDetailDonHang($id)
    {
        try {
            $sql = 'SELECT don_hang.*,trang_thai.ten_trang_thai,tai_khoan.name,tai_khoan.email,tai_khoan.dia_chi

                FROM don_hang 
                INNER JOIN trang_thai ON don_hang.trang_thai_id = trang_thai.id
                INNER JOIN tai_khoan ON don_hang.tai_khoan_id = tai_khoan.id  
                WHERE don_hang.id = :id';

            $stmt = $this->conn->prepare($sql);

            // Chỉ gọi execute một lần với tham số
            $stmt->execute([':id' => $id]);

            // Sử dụng fetch để lấy một bản ghi
            return $stmt->fetch(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }


    public function getListSpDonHang($id)
    {
        try {
            $sql = 'SELECT chi_tiet_don_hang.*,san_pham.name_sp,san_pham.price_sp
             FROM chi_tiet_don_hang 
             INNER JOIN san_pham ON chi_tiet_don_hang.san_pham_id = san_pham.id 
             WHERE chi_tiet_don_hang.don_hang_id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':id' => $id]);

            return $stmt->fetchAll();

        } catch (Exception $e) {
            echo 'Lỗi' . $e->getMessage();
        }
    }
    public function updateDonHang($id, $trang_thai_id)
    {
        try {

            $sql = "UPDATE `don_hang` SET`trang_thai_id`='$trang_thai_id' WHERE id=:id";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':id' => $id]);

        } catch (Exception $e) {
            echo 'Lỗi' . $e->getMessage();
        }
    }

    public function getAlltrangThai()
    {
        try {

            $sql = "SELECT * FROM `trang_thai`";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();

        } catch (Exception $e) {
            echo 'Lỗi' . $e->getMessage();
        }
    }

    public function deleteDonHang($id)
    {
       try {
 
          $sql = "DELETE FROM `don_hang` WHERE id=" . $id;
 
          $stmt = $this->conn->prepare($sql);
 
          $stmt->execute();
 
       } catch (Exception $e) {
          echo 'Lỗi' . $e->getMessage();
       }
    }
}
?>