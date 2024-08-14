<?php
class AdminSanPhamModel{
    public $conn; //khai báo phương thức

    public function __construct()
     {
        $this->conn = connect_DB();
     }

    //  viết hàm lấy toàn bộ danh sách sản phẩm
     public function getAllSP(){
        try {
            $sql = 'SELECT san_pham.*, danh_muc.name_danhmuc
            FROM san_pham
            INNER JOIN danh_muc ON san_pham.id_danhmuc = danh_muc.id';

            $stml = $this->conn->prepare($sql);
            $stml->execute();
            return $stml->fetchAll();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
     }
//Thêm
     public function insertSanPham($name_sp, $price_sp, $soluong_sp, $mota_sp, $img_sp, $id_danhmuc) {
        try {
            $sql = "INSERT INTO san_pham 
                (name_sp, price_sp, soluong_sp, mota_sp, img_sp, id_danhmuc)
                VALUES (:name_sp, :price_sp, :soluong_sp, :mota_sp, :img_sp, :id_danhmuc)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':name_sp' => $name_sp,
                ':price_sp' => $price_sp,
                ':soluong_sp' => $soluong_sp,
                ':mota_sp' => $mota_sp,
                ':img_sp' => $img_sp,
                ':id_danhmuc' => $id_danhmuc,
            ]);
            return $this->conn->lastInsertId();
        } catch (PDOException $e) {
            error_log("SQL Error: " . $e->getMessage());
            echo "Lỗi SQL: " . $e->getMessage();
            return false;
        }
    }
//Xóa
public function deletesp($id)
{
   try {

    // $sql = "UPDATE `san_pham` SET `active`= 0 WHERE id = ".$id;
    $sql = " DELETE FROM `san_pham` WHERE id = ".$id;
   

      $stmt = $this->conn->prepare($sql);

      $stmt->execute();

   } catch (Exception $e) {
      echo 'Lỗi' . $e->getMessage();
   }
}
// get oane 
public function getOneSP($id){
    try {
        $sql = 'SELECT san_pham.*, danh_muc.name_danhmuc
        FROM san_pham
        INNER JOIN danh_muc ON san_pham.id_danhmuc = danh_muc.id WHERE san_pham.id ='.$id;

        $stml = $this->conn->prepare($sql);
        $stml->execute();
        return $stml->fetch();
    } catch (Exception $e) {
        echo "lỗi" . $e->getMessage();
    }
 }

 public function updatesp($name_sp,$price_sp,$soluong_sp,$mota_sp,$img_sp,$id_danhmuc,$id){
    {
        try {
  
           $sql = "UPDATE `san_pham` SET `name_sp`='$name_sp',`price_sp`='$price_sp',`soluong_sp`='$soluong_sp',`mota_sp`='$mota_sp',`img_sp`='$img_sp',`id_danhmuc`='$id_danhmuc' WHERE id=$id";
  
           $stmt = $this->conn->prepare($sql);
  
           $stmt->execute();
  
        } catch (Exception $e) {
           echo 'Lỗi' . $e->getMessage();
        }
     }
  
 }
}