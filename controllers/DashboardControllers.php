<?php
class DashboardControllers
{
    public $TK;

    public $user;

    public $SP;

    public $dh;

    public $mm;
    public $ctl;
    public function __construct()
    {
        $this->TK = new ClientThanhToanModel();
        $this->user = new LoginModel();
        $this->SP = new ClientSanPhamModel();
        $this->dh = new ClientDonHangModel();
        $this->ctl = new ClientThanhToanController();
        $this->mm = new ClientMoMoModel();
    }
    function home()
    {
        $title = 'clothes';
        $view = 'home';
        require_once PATH_VIEW . 'layouts/master.php';
    }
    function info()
    {
        $title = 'thông tin khách hàng';
        $listDonHang = $this->dh->getDonHangByIdAcc($_SESSION['user']['id']);
        //Lấy đơn hàng theo id người dùng đã đăng nhập

        require_once PATH_VIEW . 'info/index.php';
    }
    function detailOrder($id)
    {
        $order = $this->dh->getDonHangById($id); // Lấy thông tin đơn hàng theo id
        $details = $this->dh->getDetailDonHang($id); // Lấy thông tin các sản phẩm có trong đơn hàng theo id đơn hàng
        //nếu người dùng ở các trạng thái chưa xử lý(đã xử lý), chưa thanh toán (), đang cbi hàng thì cho phép người dùng hủy đơn hàng.
        //nếu trạng thái là đã nhận thì cho phép hoàn hàng và hoàn thành đơn hàng
        //nếu trạng thái chưa thanh toán thì chp thanh toán
        if (isset($_POST['huyhang'])) { // Nếu người dùng ấn hủy thì cập nhật lại trạng thái và  update cộng lại số lượng cho các sản phẩm trong đơn hàng
            $this->dh->updatePayment(11, $id);
            foreach ($details as $product) {
                $old_soluong = $this->SP->getSoLuong($product['san_pham_id']); // Lấy số lujonwjg cũ
                $new_soluong = $old_soluong + $product['so_luong'];// Xử lí số lượng mới
                $this->SP->updateSoLuong($product['san_pham_id'], $new_soluong); // Update
            }
            // CHuyển hướng trang
            header("Location: " . BASE_URL . '?act=ct-donhang&id=' . $id);
            exit();
        }
        if (isset($_POST['hoanhang'])) { // Nếu ấn hoàn thì update trạng thái thành hoàn hàng
            $this->dh->updatePayment(10, $id);
            header("Location: " . BASE_URL . '?act=ct-donhang&id=' . $id);
            exit();
        }
        if (isset($_POST['hoanthanh'])) {// Nếu ấn hoàn thành thì update trạng thái thành hoàn thành
            $this->dh->updatePayment(9, $id);
            header("Location: " . BASE_URL . '?act=ct-donhang&id=' . $id);
            exit();
        }
        if (isset($_POST['thanhtoan'])) { // Nếu ấn thanh toán thì chuyển hướng đến trang thanh toán
            $this->ctl->online_checkout((double) $order['tong_tien'], time(), $order['id']);
        }
        require_once PATH_VIEW . 'info/detailorder.php';
    }
    function lienhe()
    {
        $title = 'liên hệ';
        require_once PATH_VIEW . 'lien_he/index.php';
        exit();
    }

    function thanhtoan()
    {
        $title = 'thanh toán';
        require_once PATH_VIEW . 'thanh_toan/index.php';
        exit();
    }


    function dashboard()
    {
        if (!isset($_SESSION['user'])) {
            header("location:" . BASE_URL_ADMIN . "?act=addlogin");
            exit();
        }
        $title = 'clothes';
        $view = 'dashboard';
        require_once PATH_VIEW_ADMIN . 'layouts/master.php';
    }
    function addformlogin()
    {
        require_once PATH_VIEW_ADMIN . 'login/login.php';
        exit();
    }

}
