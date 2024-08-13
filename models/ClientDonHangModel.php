<?php
class ClientDonHangModel
{
    public $conn;
    public function __construct()
    {
        $this->conn = connect_DB();
    }
    public function insertdonhang($ten_nguoi_nhan, $email_nguoi_nhan, $sđt_nguoi_nhan, $dia_chi_nguoi_nhan, $ngay_dat, $tong_tien,$ghi_chu, $tai_khoan_id, $phuong_thuc_thanh_toan_id, $san_pham_id, $ma_don_hang)
    {
        try {

            $sql = "INSERT INTO `don_hang`( `ten_nguoi_nhan`, `email_nguoi_nhan`, `sđt_nguoi_nhan`, `dia_chi_nguoi_nhan`, `ngay_dat`, `tong_tien`,`ghi_chu`, `tai_khoan_id`, `phuong_thuc_thanh_toan_id`, `san_pham_id` , `ma_don_hang`)
        VALUES ('$ten_nguoi_nhan','$email_nguoi_nhan','$sđt_nguoi_nhan','$dia_chi_nguoi_nhan','$ngay_dat','$tong_tien','$ghi_chu','$tai_khoan_id','$phuong_thuc_thanh_toan_id','$san_pham_id','$ma_don_hang')";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

        } catch (Exception $e) {
            echo 'Lỗi' . $e->getMessage();
        }
    }
    public function insertchitietdonhang($don_gia,$so_luong,$thanh_tien,$don_hang_id,$san_pham_id)
    {
        try {

            $sql = "INSERT INTO `chi_tiet_don_hang`(`don_gia`, `so_luong`, `thanh_tien`, `don_hang_id`, `san_pham_id`) 
            VALUES ('$don_gia','$so_luong','$thanh_tien','$don_hang_id','$san_pham_id')";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

        } catch (Exception $e) {
            echo 'Lỗi' . $e->getMessage();
        }
    }
}
?>