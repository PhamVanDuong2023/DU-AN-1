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
            $sql = "SELECT don_hang.*,trang_thai_don_hang.ten_trang_thai FROM `don_hang` INNER JOIN trang_thai_don_hang ON don_hang.trang_thai_id=trang_thai_don_hang.id";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();

        } catch (Exception $e) {
            echo 'Lỗi' . $e->getMessage();
        }
    }
}
?>