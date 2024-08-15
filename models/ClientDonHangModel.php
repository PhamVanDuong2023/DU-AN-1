<?php
class ClientDonHangModel
{
    public $conn;
    public function __construct()
    {
        $this->conn = connect_DB();
    }
    public function insertdonhang($ten_nguoi_nhan, $email_nguoi_nhan, $sđt_nguoi_nhan, $dia_chi_nguoi_nhan, $ngay_dat, $tong_tien, $ghi_chu, $tai_khoan_id, $phuong_thuc_thanh_toan_id, $trang_thai_id,  $ma_don_hang)
    {
        try {

            $sql = "INSERT INTO `don_hang`( `ten_nguoi_nhan`, `email_nguoi_nhan`, `sđt_nguoi_nhan`, `dia_chi_nguoi_nhan`, `ngay_dat`, `tong_tien`,`ghi_chu`, `tai_khoan_id`, `phuong_thuc_thanh_toan_id`,`trang_thai_id`, `ma_don_hang`)
        VALUES ('$ten_nguoi_nhan','$email_nguoi_nhan','$sđt_nguoi_nhan','$dia_chi_nguoi_nhan','$ngay_dat','$tong_tien','$ghi_chu','$tai_khoan_id','$phuong_thuc_thanh_toan_id',$trang_thai_id,'$ma_don_hang')";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();
            $id_don_hang = $this->conn->lastInsertId();

            return $id_don_hang;
        } catch (Exception $e) {
            echo 'Lỗi' . $e->getMessage();
        }
    }
    public function insertchitietdonhang($don_gia, $so_luong, $thanh_tien, $don_hang_id, $san_pham_id)
    {
        try {

            $sql = "INSERT INTO `chi_tiet_don_hang`(`don_gia`, `so_luong`, `thanh_tien`, `don_hang_id`, `san_pham_id`) 
            VALUES ($don_gia,$so_luong,$thanh_tien,$don_hang_id,$san_pham_id)";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();
        } catch (Exception $e) {
            echo 'Lỗi' . $e->getMessage();
        }
    }
    public function getDonHangByIdAcc($id)
    {
        try {

            $sql = "SELECT `don_hang`.*,trang_thai.ten_trang_thai,phuong_thu_thanh_toan.ten_phuong_thuc FROM `don_hang` INNER JOIN trang_thai ON don_hang.trang_thai_id = trang_thai.id INNER JOIN phuong_thu_thanh_toan ON don_hang.phuong_thuc_thanh_toan_id = phuong_thu_thanh_toan.id WHERE tai_khoan_id = $id";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'Lỗi' . $e->getMessage();
        }
    }
    public function getDonHangById($id)
    {
        try {

            $sql = "SELECT `don_hang`.*,trang_thai.ten_trang_thai,phuong_thu_thanh_toan.ten_phuong_thuc FROM `don_hang` INNER JOIN trang_thai ON don_hang.trang_thai_id = trang_thai.id INNER JOIN phuong_thu_thanh_toan ON don_hang.phuong_thuc_thanh_toan_id = phuong_thu_thanh_toan.id WHERE don_hang.id = $id";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();
            return $stmt->fetch();
        } catch (Exception $e) {
            echo 'Lỗi' . $e->getMessage();
        }
    }
    public function getDetailDonHang($id)
    {
        try {
            $sql = 'SELECT chi_tiet_don_hang.*, san_pham.name_sp , san_pham.img_sp
            FROM chi_tiet_don_hang
            INNER JOIN san_pham ON chi_tiet_don_hang.san_pham_id = san_pham.id 
            WHERE chi_tiet_don_hang.don_hang_id = :don_hang_id';

            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['don_hang_id' => $id]);

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "loi" . $e->getMessage();
        }
    }
    public function updatePayment($trang_thai_id,$id){
        try{
          $sql = 'UPDATE don_hang SET `trang_thai_id` = :trang_thai_id WHERE id = :id';

          $stmt = $this->conn->prepare($sql);
          $stmt->execute(['id'=>$id, 'trang_thai_id'=>$trang_thai_id]);

          return true;
        }catch(Exception $e){
            echo "loi" . $e->getMessage();

        }
    }
}
