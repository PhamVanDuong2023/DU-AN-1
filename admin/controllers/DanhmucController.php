<?php


class DanhmucController{
   
}




// function list_dm()
// {
//     $title = 'Danh muc';
//     $view = 'danh_muc/index';

//     $danh_muc = listAll('danh_muc');
//     require_once PATH_VIEW_ADMIN . 'layouts/master.php';
// }
// function delete_dm($id)
// {
//     delete2('danh_muc', $id);
//     $_SESSION['thong_bao'] = "thao tác thành công";
//     header('Location:' . BASE_URL_ADMIN . "?act=danhmuc");
// }
// function insert_dm()
// {
//     $title = 'Thêm Danh muc';
//     $view = 'danh_muc/insert';

//     if (isset($_POST['name_danhmuc']) && $_POST['name_danhmuc']) {
//         if (!empty($_POST)) {
//             $data = [
//                 "name_danhmuc" => $_POST['name_danhmuc'],
//             ];
//             insert('danh_muc', $data);
//             $_SESSION['thong_bao'] = "thao tác thành công";
//             header('Location:' . BASE_URL_ADMIN . "?act=danhmuc");
//             exit();
//         }
//     }else{
//         $_SESSION['loi'] = "vui lòng nhập thông tin";
//     }
//     require_once PATH_VIEW_ADMIN . 'layouts/master.php';
// }


// function edit_dm($id)
// {
//     $danhmuc1 = showOne('danh_muc', $id);
//     $title = 'Cập nhật danh mục' . $danhmuc1['name_danhmuc'];

//     if (empty($danhmuc1)) {
//         e404();
//     }
//     $view = 'danh_muc/update';
//     require_once PATH_VIEW_ADMIN . 'layouts/master.php';

// }
// function update_dm($id)
// {
//     if (isset($_POST['name_danhmuc']) && $_POST['name_danhmuc']) {
//         if (!empty($_POST)) {
//             $data = [
//                 'name_danhmuc' => $_POST['name_danhmuc'],
//             ];
//             update('danh_muc', $id, $data);
//             $_SESSION['thong_bao'] = "thao tác thành công";
//         }
//         header('Location:' . BASE_URL_ADMIN . "?act=danhmuc");
//         exit();
//     } else {
//         $_SESSION['loi'] = "vui lòng nhập thông tin";
//         $view = 'danh_muc/update';
//         require_once PATH_VIEW_ADMIN . 'layouts/master.php';
//     }

    
// }
?>