<?php
class ClientThanhToanController
{
    public $TK;

    public $SP;

    public $dh;

    public $mm;
    public function __construct()
    {
        $this->TK = new ClientThanhToanModel();
        $this->SP = new ClientSanPhamModel();
        $this->dh = new ClientDonHangModel();
        $this->mm = new ClientMoMoModel();
    }
    public function successOrder(){
        require_once PATH_VIEW . 'thanh_toan/success.php';
    }
    public function thanhToan()
    {
        
        if (isset($_POST["select_product"])) {

            $_SESSION['select_product'] = $_POST['select_product'];
        }
        $selected_product_ids = isset($_SESSION['select_product']) ? $_SESSION['select_product'] : [];

        $selected_products = array_filter($_SESSION['cart'], function ($item) use ($selected_product_ids) {
            return in_array($item['id'], $selected_product_ids);
        });
        // echo "<pre>";
        // print_r($selected_products);
        // exit();
        $id = $_SESSION['user']['id'];
    
        $listPhuongThuc = $this->TK->getPhuongThucTT();
        $list1TK = $this->TK->getOneTK($id);

        $title = "1 tai khoan";

        require_once PATH_VIEW . 'thanh_toan/index.php';
    }
    public function tienHanhThanhToan()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Xử lý POST request từ form
            if ($_POST['id_pt'] == '1') {
                $listSanPham = $this->SP->get8SanPham();
                $id_tk = $_POST['id_tk'];
                $name = $_POST['name'];
                $email = $_POST['email'];
                $sdt = $_POST['sdt'];
                $diachi = $_POST['diachi'];
                $tinh = $_POST['province_name'];
                $huyen = $_POST['district_name'];
                $xa = $_POST['ward_name'];
                $diachi_full = $diachi . ', ' . $xa . ', ' . $huyen . ', ' . $tinh;
                $ngay_dat = date('Y-m-d');
                $id_pt = $_POST['id_pt'];
                $ghi_chu = $_POST['ghi_chu'];
                $ma_don_hang = 'null';
                $selected_product_ids = isset($_SESSION['select_product']) ? $_SESSION['select_product'] : [];

                foreach ($selected_product_ids as $product_id) {
                    $product = array_filter($_SESSION['cart'], function ($item) use ($product_id) {
                        return $item['id'] === $product_id;
                    });

                    if (!empty($product)) {
                        $product = array_shift($product);
                        $tong_tien = floatval(str_replace(',', '', $product['price_sp'])) * $product['soluong_sp'] + 30000;

                        $id_don_hang = $this->dh->insertdonhang($name, $email, $sdt, $diachi_full, $ngay_dat, $tong_tien, $ghi_chu, $id_tk, $id_pt, $product_id, $ma_don_hang);


                        $this->dh->insertchitietdonhang(
                            floatval(str_replace(',', '', $product['price_sp'])),
                            $product['soluong_sp'],
                            floatval(str_replace(',', '', $product['price_sp'])) * $product['soluong_sp']
                            ,
                            $id_don_hang,
                            $product['id']
                        );
                        $old_soluong=$this->SP->getSoLuong( $product['id']);
                       

                        $new_soluong=$old_soluong-$product['soluong_sp'];

                        $this->SP->updateSoLuong($product['id'],$new_soluong);



                    }
                    

                }
               



                // Xóa sản phẩm khỏi giỏ hàng sau khi xử lý
                foreach ($_SESSION['select_product'] as $item => $value) {
                    unset($_SESSION['cart'][$value]);
                }
                $soluong = count($_SESSION['cart']);
                // $view = "thanh_toan/success";

       
                header("location:".BASE_URL."?act=success-order");

                exit();

            } else if ($_POST['id_pt'] == '2') {
                // Lưu thông tin vào session và chuyển hướng tới MoMo
                $_SESSION['user_info'] = [
                    'id_tk' => $_POST['id_tk'],
                    'name' => $_POST['name'],
                    'email' => $_POST['email'],
                    'sdt' => $_POST['sdt'],
                    'diachi' => $_POST['diachi'],
                    'tinh' => $_POST['province_name'],
                    'huyen' => $_POST['district_name'],
                    'xa' => $_POST['ward_name'],
                    'ngay_dat' => date('Y-m-d'),
                    'ghi_chu' => $_POST['ghi_chu'],
                ];
                $this->online_checkout(); // Chuyển hướng tới MoMo
                //exit();
            }
        }
        // Xử lý GET request khi MoMo trả về kết quả thanh toán
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['transId']) && isset($_GET['resultCode'])) {

            $transId = ($_GET['transId']);
            $resultCode = $_GET['resultCode'];
            $amount = $_GET['amount'];
            $this->mm->insertMoMo($transId, $resultCode, $amount);

            if ($resultCode == '0') {

                $listSanPham = $this->SP->get8SanPham();

                $userInfo = $_SESSION['user_info'];
                $id_tk = $userInfo['id_tk'];
                $name = $userInfo['name'];
                $email = $userInfo['email'];
                $sdt = $userInfo['sdt'];
                $ngay_dat = $userInfo['ngay_dat'];
                $diachi = $userInfo['diachi'];
                $tinh = $userInfo['tinh'];
                $huyen = $userInfo['huyen'];
                $xa = $userInfo['xa'];
                $ghi_chu = $userInfo['ghi_chu'];
                $diachi_full = $diachi . ', ' . $xa . ', ' . $huyen . ', ' . $tinh;
                $selected_product_ids = isset($_SESSION['select_product']) ? $_SESSION['select_product'] : [];

                foreach ($selected_product_ids as $product_id) {
                    $product = array_filter($_SESSION['cart'], function ($item) use ($product_id) {
                        return $item['id'] === $product_id;
                    });

                    if (!empty($product)) {
                        $product = array_shift($product);
                        $tong_tien = floatval(str_replace(',', '', $product['price_sp'])) * $product['soluong_sp'] + 30000;

                        $id_don_hang = $this->dh->insertdonhang($name, $email, $sdt, $diachi_full, $ngay_dat, $tong_tien, $ghi_chu, $id_tk, 2, $product_id, $transId);
                        $this->dh->insertchitietdonhang(
                            floatval(str_replace(',', '', $product['price_sp'])),
                            $product['soluong_sp'],
                            floatval(str_replace(',', '', $product['price_sp'])) * $product['soluong_sp']
                            ,
                            $id_don_hang,
                            $product['id']
                        );
                        $old_soluong=$this->SP->getSoLuong( $product['id']);
                       

                        $new_soluong=$old_soluong-$product['soluong_sp'];

                        $this->SP->updateSoLuong($product['id'],$new_soluong);

                    }
                }
                //exit();

                // Xóa sản phẩm khỏi giỏ hàng và session sau khi hoàn tất
                foreach ($_SESSION['select_product'] as $item => $value) {
                    unset($_SESSION['cart'][$value]);
                }

                unset($_SESSION['user_info']);
                $soluong = count($_SESSION['cart']);

                $_SESSION['dat-hang'] = "Bạn đã đặt hàng thành công";
                header("location:" . BASE_URL . "?act=san-pham");
                exit();
            } else {
                // Xử lý nếu thanh toán thất bại
                echo "Thanh toán thất bại. Mã lỗi: " . $resultCode;
            }
        }
    }
    public function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data)
            )
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }
    public function online_checkout()
    {
        $selected_product_ids = isset($_SESSION['select_product']) ? $_SESSION['select_product'] : [];
        foreach ($selected_product_ids as $product_id) {
            $product = array_filter($_SESSION['cart'], function ($item) use ($product_id) {
                return $item['id'] === $product_id;
            });
            $tong_tien = 0;
            if (!empty($product)) {
                $product = array_shift($product);
                $tong_tien += floatval(str_replace(',', '', $product['price_sp'])) * $product['soluong_sp'];
            }
            $tong_dh = $tong_tien + 30000;
        }
        ;
        // Endpoint cho thanh toán bằng thẻ MoMo
        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";

        // Các thông tin cấu hình MoMo
        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh toán qua thẻ MoMo";

        // Tính toán số tiền và ID đơn hàng
        $amount = $tong_dh; // Bạn cần tính toán tổng số tiền từ giỏ hàng
        $orderId = time(); // ID đơn hàng
        $redirectUrl = "http://da1.test/?act=tien-hanh-thanh-toan";
        $ipnUrl = "http://da1.test/?act=tien-hanh-thanh-toan";
        $extraData = ""; // Các thông tin thêm nếu cần

        $requestId = time() . "";
        $requestType = "payWithATM"; // Chuyển thành "payWithATM" cho thanh toán bằng thẻ MoMo
        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, $secretKey);

        $data = array(
            'partnerCode' => $partnerCode,
            'partnerName' => "Test",
            'storeId' => "MomoTestStore",
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => $extraData,
            'requestType' => $requestType, // Sử dụng "payWithATM" cho thẻ MoMo
            'signature' => $signature
        );

        // Gọi API MoMo
        $result = $this->execPostRequest($endpoint, json_encode($data));
        $jsonResult = json_decode($result, true);

        // Kiểm tra nếu có 'payUrl'
        if (isset($jsonResult['payUrl'])) {
            header('Location: ' . $jsonResult['payUrl']); // Điều hướng đến trang thanh toán của MoMo
            exit();
        } else {
            // Xử lý khi không có 'payUrl' trong phản hồi
            echo "Đã xảy ra lỗi trong quá trình tạo đơn hàng với MoMo.";
        }
    }
}
?>