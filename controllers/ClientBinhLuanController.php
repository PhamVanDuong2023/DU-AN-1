<?php
class ClientBinhLuanController
{
    public $BinhLuan;
    public $sanPham;
    public function __construct()
    {
        $this->BinhLuan = new ClientBinhLuanModel();
        $this->sanPham= new ClientSanPhamModel();
    }
    public function danhsachbinhluan()
    {
        $listBinhLuan = $this->BinhLuan->getAllBinhLuan();
        $listSanPham = $this->BinhLuan->getAllBinhLuan();
        $listTaiKhoan = $this->BinhLuan->getAllBinhLuan();

        $title = "list bình luận";

        $view = "chi_tiet_sp/index";

    }
    public function themmoibinhluan()
    {
        if (isset($_POST['comment']) && $_POST['comment']) {

            $noi_dung = $_POST['comment'];

            $id_taikhoan = 1;

            $id_sp = $_GET['id'];

            $ngay_bl = date('Y-m-d');
            
            $list1SanPham=$this->sanPham->get1SanPham($id_sp);

            $this->BinhLuan->insertBinhluan($noi_dung, $id_taikhoan, $id_sp, $ngay_bl);

            $_SESSION['thong_bao'] = "thao tác thành công";

            $_SESSION['flash'] = true;

            header("location:" . BASE_URL . "?act=chi-tiet-sp&id=".$id_sp);
            exit();

        } else {

            $_SESSION['loi'] = "vui lòng nhập thông tin";

            $_SESSION['flash'] = true;

            header("location:" . BASE_URL . "?act=chi-tiet-sp");
            exit();
        }
    }
}
?>