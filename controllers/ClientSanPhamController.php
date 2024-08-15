<?php
class ClientSanPhamController
{
    public $SanPham;
    public $binhluan;
    public function __construct()
    {
        $this->SanPham = new ClientSanPhamModel();
        $this->binhluan = new ClientBinhLuanModel();
    }
    public function danhsachsanpham()
    {
        if (count($_SESSION['cart']) > 0) {
            $soluong = count($_SESSION['cart']);
        } else {
            $soluong = 0;
        }

        $listSanPham = $this->SanPham->get8SanPham();
        $listDanhMuc = $this->SanPham->get8DanhMuc();

        $title = "list sản phẩm";

        $view = "home";

        require_once PATH_VIEW . 'layouts/master.php';
    }
    public function getOneSanPham()
    {
        $id = $_GET['id'];

        $soluong=$this->SanPham->getSoLuong($id);
        $list1SanPham = $this->SanPham->get1SanPham($id);
        $binh_luan = $this->binhluan->getBinhLuanTheoSp($id);
        $soluonggh=count($_SESSION['cart']);
       

        $title = "list sản phẩm chi tiết";

        require_once PATH_VIEW . 'chi_tiet_sp/index.php';
    }
    function list8sp()
    {
        if (count($_SESSION['cart']) > 0) {

            $soluong = count($_SESSION['cart']);
        } else {

            $soluong = 0;
        }

        $listDanhMuc = $this->SanPham->get8DanhMuc();
        $listAllSanPham = $this->SanPham->get8SanPham();

        $title = "list sản phẩm";

        require_once PATH_VIEW . 'san_pham/index.php';

        exit();
    }
}
?>