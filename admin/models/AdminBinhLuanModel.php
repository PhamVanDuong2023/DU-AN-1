<?php
class AdminBinhLuanModel
{
    public $bl;
    public function __construct()
    {
        $this->bl = connect_DB();
    }
    public function getAllbinhluan()
    {
        try {
            $sql = "SELECT `binh_luan`.*, `san_pham`.*, `tai_khoan`.*
            FROM `binh_luan`
            INNER JOIN `tai_khoan` ON `binh_luan`.`id_taikhoan` = `tai_khoan`.`id`
            INNER JOIN `san_pham` ON `binh_luan`.`id_sp` = `san_pham`.`id`";
            $stmt = $this->bl->prepare($sql);
            $stmt->execute();
            return $stmt->fetchALl();
        } catch (Exception $e) {
            echo 'lỗi' . $e->getMessage();
        }
    }

    public function deletebinhluan($id)
    {
        try {
            // Sử dụng prepared statement để tránh SQL Injection
            $sql = "DELETE FROM binh_luan WHERE id = :id";
            $stmt = $this->bl->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            
            // Kiểm tra số dòng bị ảnh hưởng
            return $stmt->rowCount() > 0;
        } catch (Exception $e) {
            // Hiển thị thông báo lỗi
            echo 'Lỗi: ' . $e->getMessage();
            return false;
        }
    }
    
}