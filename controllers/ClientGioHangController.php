<?php
class ClientGioHangController
{
    public $SanPham;
    function viewGioHang()
    {
        $title = 'cart';
        require_once PATH_VIEW . 'gio_hang/index.php';
        exit();
    }
    public function themmoigiohang()
    {
        if (isset($_POST['submitCart'])) {
            $id = $_POST['id'];
            $name_sp = $_POST['name_sp'];
            $price_sp = $_POST['price_sp'];
            $img_sp = $_POST['img_sp'];
            $soluong_sp = 1;

            if (isset($_SESSION['cart'][$id])) {
                $_SESSION['cart'][$id]['soluong_sp'] += 1;
            } else {
                $sp = array(
                    'id' => $id,
                    'name_sp' => $name_sp,
                    'price_sp' => $price_sp,
                    'img_sp' => $img_sp,
                    'soluong_sp' => $soluong_sp
                );
                $_SESSION['cart'][$id] = $sp;
                $_SESSION['tb_gio_hang'] = "Thêm vào giỏ hàng thành công";
            }
        }
        header("location:" . BASE_URL);
    }
    public function themmoigiohangsp()
    {
        if (isset($_POST['submitCart'])) {
            $id = $_POST['id'];
            $name_sp = $_POST['name_sp'];
            $price_sp = $_POST['price_sp'];
            $img_sp = $_POST['img_sp'];
            $soluong_sp = 1;

            if (isset($_SESSION['cart'][$id])) {
                $_SESSION['cart'][$id]['soluong_sp'] += 1;
            } else {
                $sp = array(
                    'id' => $id,
                    'name_sp' => $name_sp,
                    'price_sp' => $price_sp,
                    'img_sp' => $img_sp,
                    'soluong_sp' => $soluong_sp
                );
                $_SESSION['cart'][$id] = $sp;
                $_SESSION['tb_gio_hang'] = "Thêm vào giỏ hàng thành công";
            }
        }
        header("location:" . BASE_URL . "?act=san-pham");
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