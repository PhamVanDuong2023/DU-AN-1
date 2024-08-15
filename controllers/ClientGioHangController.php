<?php
class ClientGioHangController
{
    public $SanPham;

    public function __construct()
    {
        $this->SanPham = new ClientSanPhamModel();
       
    }
    function viewGioHang()
    {
        $title = 'cart';
        require_once PATH_VIEW . 'gio_hang/index.php';
        exit();
    }

    public function themmoigiohangTrangsp()
    {
        if($_SESSION['cart'][$_POST['id']]['soluong_sp']>=20){
            $_SESSION['loi_gio_hang']="Số lượng sản phẩm này đã bằng mức tối đa 20 sản phẩm";
            header("location:" . BASE_URL . "?act=san-pham" ); 
            exit();
        }
        if (isset($_POST['submitCart'])) {
            $id = $_POST['id'];
            $name_sp = $_POST['name_sp'];
            $price_sp = $_POST['price_sp'];
            $img_sp = $_POST['img_sp'];
            $soluong_sp = isset($_POST['soluong_sp']) ? intval($_POST['soluong_sp']) : 1;

            // Validate số lượng
            if ($soluong_sp < 1 || $soluong_sp > 20) {
                $_SESSION['tb_gio_hang'] = "Số lượng phải nằm trong khoảng từ 1 đến 20.";
                header("location:" . BASE_URL . "?act=san-pham"); // Điều hướng về trang sản phẩm
                exit();
            }

            if (isset($_SESSION['cart'][$id])) {
                $_SESSION['cart'][$id]['soluong_sp'] += $soluong_sp;
            } else {
                $sp = array(
                    'id' => $id,
                    'name_sp' => $name_sp,
                    'price_sp' => $price_sp,
                    'img_sp' => $img_sp,
                    'soluong_sp' => $soluong_sp
                );
                $_SESSION['cart'][$id] = $sp;
            }

            $_SESSION['tb_gio_hang'] = "Thêm vào giỏ hàng thành công";
        }
        header("location:" . BASE_URL."?act=san-pham");
    }
    public function themmoigiohangTrangHome()
    {
        if($_SESSION['cart'][$_POST['id']]['soluong_sp']>=20){
            $_SESSION['loi_gio_hang']="Số lượng sản phẩm này đã bằng mức tối đa 20 sản phẩm";
            header("location:" . BASE_URL); 
            exit();
        }
        if (isset($_POST['submitCart'])) {
            $id = $_POST['id'];
            $name_sp = $_POST['name_sp'];
            $price_sp = $_POST['price_sp'];
            $img_sp = $_POST['img_sp'];
            $soluong_sp = isset($_POST['soluong_sp']) ? intval($_POST['soluong_sp']) : 1;

            // Validate số lượng
            if ($soluong_sp < 1 || $soluong_sp > 20) {
                $_SESSION['tb_gio_hang'] = "Số lượng phải nằm trong khoảng từ 1 đến 20.";
                header("location:" . BASE_URL ); // Điều hướng về trang chủ
                exit();
            }

            if (isset($_SESSION['cart'][$id])) {
                $_SESSION['cart'][$id]['soluong_sp'] += $soluong_sp;
            } else {
                $sp = array(
                    'id' => $id,
                    'name_sp' => $name_sp,
                    'price_sp' => $price_sp,
                    'img_sp' => $img_sp,
                    'soluong_sp' => $soluong_sp
                );
                $_SESSION['cart'][$id] = $sp;
            }

            $_SESSION['tb_gio_hang'] = "Thêm vào giỏ hàng thành công";
        }
        header("location:" . BASE_URL);
    }
    public function themmoigiohangTrangChiTietsp()
    {
        if (isset($_POST['submitCart'])) {

            if($_SESSION['cart'][$_POST['id']]['soluong_sp']>=20){
                $_SESSION['loi_gio_hang']="Số lượng sản phẩm này đã bằng mức tối đa 20 sản phẩm";
                header("location:" . BASE_URL . "?act=chi-tiet-sp&id=" . $_POST['id']); 
                exit();
            }
            $id = $_POST['id'];
            $name_sp = $_POST['name_sp'];
            $price_sp = $_POST['price_sp'];
            $img_sp = $_POST['img_sp'];
            $soluong_sp = isset($_POST['soluong_sp']) ? intval($_POST['soluong_sp']) : 1;

            // Validate số lượng
            if ($soluong_sp < 1 || $soluong_sp > 20) {
                $_SESSION['tb_gio_hang'] = "Số lượng phải nằm trong khoảng từ 1 đến 20.";
                header("location:" . BASE_URL . "?act=chi-tiet-sp&id=" . $id); 
                exit();
            }

            if (isset($_SESSION['cart'][$id])) {
                $_SESSION['cart'][$id]['soluong_sp'] += $soluong_sp;
            } else {
                $sp = array(
                    'id' => $id,
                    'name_sp' => $name_sp,
                    'price_sp' => $price_sp,
                    'img_sp' => $img_sp,
                    'soluong_sp' => $soluong_sp
                );
                $_SESSION['cart'][$id] = $sp;
            }

            $_SESSION['tb_gio_hang'] = "Thêm vào giỏ hàng thành công";
        }
        header("location:" . BASE_URL."?act=chi-tiet-sp&&id=".$id);
    }


    public function xoagiohang()
    {
        if (isset($_GET['id'])) {

            $id = $_GET['id'];

            if (isset($_SESSION['cart'][$id])) {

                unset($_SESSION['cart'][$id]);

                $_SESSION['tb_xoa'] = "Xóa thành công sản phẩm";
            }
        }
        header("location:" . BASE_URL . "?act=gio-hang");
    }
    public function capnhatsoluong()
    {
        session_start();
        if (isset($_POST['id']) && isset($_POST['quantity'])) {
            $id = $_POST['id'];
            $soluong = intval($_POST['quantity']);

            if (isset($_SESSION['cart'][$id])) {
                if ($soluong <= 0) {
                    unset($_SESSION['cart'][$id]);
                } else {
                    $_SESSION['cart'][$id]['soluong_sp'] = $soluong;
                }
                $_SESSION['tb_capnhat'] = "Cập nhật giỏ hàng thành công";
            }
        }
        header("location:" . BASE_URL . "?act=gio-hang");
    }
}
?>