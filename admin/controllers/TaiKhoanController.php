<?php
class TaiKhoanController{
    
}




//  function taikhoanListAll(){
//     $title='Danh Sách tài khoản';
//     $view='taikhoan/index';
//     $script2='taikhoan/script';
//     $style ='databale';
//     $taikhoan = listAll('taikhoan');
//     require_once PATH_VIEW_ADMIN . 'layouts/maser.php';
// }
// function taikhoanShowOne($id){
// $taikhoan1 =showOne('taikhoan', $id);
//  if(empty($taikhoan1)){
//     e404();
//  }
// $title='Chi tiết tài khoản '. $taikhoan1['name'];
// $view='taikhoan/show';
// require_once PATH_VIEW_ADMIN . 'layouts/maser.php';

// }

// function taikhoanCreate(){
//     $title='Danh sách tài khoản ';
//     $view='taikhoan/cretae';
//     if(!empty($_POST)){
//         $data=[
//             'username'=> $_POST['name']	,
//             'password'=> $_POST['password']	,
//             'email'=> $_POST['email']	,
//             'name'=> $_POST['name']	,
//             'dia_chi'=> $_POST['diachi']	,
//             'phone'=> $_POST['sdt']	,
//             'age'=> $_POST['age']	,
//             'vai_tro'=> $_POST['vaitro'],


//         ];
//         insert('taikhoan',$data);
//         header('location:'. BASE_URL_ADMIN . '?act=taikhoan');
//         exit();
//     }
//     require_once PATH_VIEW_ADMIN . 'layouts/master.php';

// }

// function taikhoanUpdate($id){
//     $taikhoan1 = showOne('taikhoan', $id);
//     if(empty($taikhoan1)){
//         e404();
//     }
//     $title='Cập nhật tài khoản :'.$taikhoan1['username'];
//     $view ='taikhoan/update';
//     if(!empty($_POST)){
//         $data=[
//             'username'=> $_POST['name']	,
//             'password'=> $_POST['password']	,
//             'email'=> $_POST['email']	,
//             'name'=> $_POST['name']	,
//             'dia_chi'=> $_POST['diachi']	,
//             'phone'=> $_POST['sdt']	,
//             'age'=> $_POST['age']	,
//             'vai_tro'=> $_POST['vaitro'],
//         ];
//             update('taikhoan',$id,$data);
//             header('location:'.BASE_URL_ADMIN.'?act=taikhoan-update&id='.$id);
//             exit();

//     }
//     require_once PATH_VIEW_ADMIN . 'layouts/master.php';

// }

// function taikhoanDelete($id){
//     delete2('taikhoan',$id);
//     header('Location: ' . BASE_URL_ADMIN. '?act=taikhoan');
//     exit();
// }
?>
