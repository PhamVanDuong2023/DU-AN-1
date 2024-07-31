<?php

class ClientSanPhamController
{
    public $SanPham;


    public function __construct()
    {
        $this->SanPham = new ClientSanPhamModel();
    }
    public function danhsachsanpham()
    {

        $listSanPham = $this->SanPham->get8SanPham();
        

        $title = "list sản phẩm";

        $view = "home";

        require_once PATH_VIEW . 'layouts/master.php';
    }
    public function getOneSanPham() {

        $id=$_GET['id'];

        $list1SanPham = $this->SanPham->get1SanPham($id);


        $title = "list sản phẩm chi tiết";

       

        require_once PATH_VIEW . 'chi_tiet_sp/index.php';
    }
    function list8sp()
    {
        $listAllSanPham = $this->SanPham->get8SanPham(); 

        $title = "list sản phẩm";

        require_once PATH_VIEW . 'san_pham/index.php';
        
        exit();
    }
}
?>