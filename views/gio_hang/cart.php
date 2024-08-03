<?php session_start();

$action_type = $_GET['action_type'];
if ($action_type == 'add_item') {
	$id = $_GET['id'];
	$name_sp = $_GET['name_sp'];
	$soluong_sp = $_GET['soluong_sp'];
	$price = $_GET['price_sp'];

	$product_arr = array(
		'id' => $id,
		'name_sp' => $name_sp,
		'soluong_sp' => $soluong_sp,
		'price_sp' => $price_sp,                
	);

	if (!empty($_SESSION['cart'])) {
		$product_ids = array_column($_SESSION['cart'], 'id');
		if (in_array($id, $product_ids)) {
			foreach ($_SESSION['cart'] as $key => $val) {
				if ($_SESSION['cart'][$key]['id'] == $id) {
					$_SESSION['cart'][$key]['soluong_sp'] = $_SESSION['cart'][$key]['soluong_sp'] + $soluong_sp;
				}

			}

		} else {
			$_SESSION['cart'][] = $product_arr;
		}
	} else {
		$_SESSION['cart'][] = $product_arr;
	}
	header('Location: ' . BASE_URL . "?act=cart");

}
if ($action_type == 'remove_item') {
	$index = $_GET['index'];
	if (isset($_SESSION['cart'])) {
		unset($_SESSION['cart'][$index]);
		header('Location: ' . BASE_URL . "?act=cart");
	}

}

?>