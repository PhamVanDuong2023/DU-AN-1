<?php


// <!-- hiển thị thông báo thành công -->

if (isset($_SESSION['thong_bao']) && $_SESSION['thong_bao'] != "") { ?>
  <div class="alert alert-success"><?php echo $_SESSION['thong_bao'] ?></div>
  <?php
  unset($_SESSION['thong_bao']);

} else {
  echo "";
}

?>
<!-- hiện thị thông báo lỗi -->
<?php
if (isset($_SESSION['loi'])&&$_SESSION['loi']) { 
?>
<div class="alert alert-danger"><?php
 echo $_SESSION['loi'] 
?></div> 
<?php
unset($_SESSION['loi']);
}else{
  echo "";

}
?>

<?php
if (isset($_SESSION['loi']) && !empty($_SESSION['loi'])) { ?>
    <div class="alert alert-danger">
        <?php echo htmlspecialchars($_SESSION['loi'], ENT_QUOTES, 'UTF-8'); ?>
    </div>
    <?php unset($_SESSION['loi']);
}
?>
<section class="content" >
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title" style="text-align: center; font-weight: 20000;">Tài khoản</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr style="text-align: center;">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Địa chỉ</th>
                                <th>Tuổi</th>
                                <th>Ảnh</th></th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Email</th>
                                <th>Vai trò</th>
                                <th style="width: 200px;">Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $stt = 0;
                            // if (isset($listTaiKhoan) && is_array($listTaiKhoan)) {
                            foreach ($listTaiKhoan as $tkhoan) {
                                $stt++;

                            ?>

                                <tr style="text-align: center;">
                                    <td><?php echo $stt  ?></td>
                                    <td><?php echo $tkhoan['name'] ?></td>
                                    <td><?php echo $tkhoan['dia_chi'] ?>
                                    </td>
                                    <td><?php echo $tkhoan['age'] ?></td>
                                    <td>
                                        <img src="<?php echo htmlspecialchars($tkhoan['img'], ENT_QUOTES, 'UTF-8'); ?>" 
                                             alt="Ảnh đại diện" 
                                             style="width: 30px; height: 30px; object-fit: cover; border-radius: 50%;">
                                    </td>
                                    <td><?php echo $tkhoan['username'] ?></td>
                                    <td><?php echo str_repeat('*', strlen($tkhoan['password'])) ?></td>
                                    <td><?php echo $tkhoan['email'] ?></td>
                                    <td class="badge badge-success"   ><?php echo $tkhoan['name_vaitro']   ?></td>
                                    <td>
                                        <a href="<?= BASE_URL_ADMIN ?>?act=taikhoan-edit&id=<?php echo $tkhoan['id'] ?>" class="label label-warning">Sửa</a>
                                        <a href="<?= BASE_URL_ADMIN ?>?act=taikhoan-delete&id=<?php echo $tkhoan['id'] ?>" class="label label-danger" onclick="return confirm('Bạn có chắc muốn xóa không ?')">Xóa</a>
                                        <a href="<?= BASE_URL_ADMIN ?>?act=chi-tiet-tai-khoan&id=<?php echo $tkhoan['id'] ?>" class="label label-warning">Chi tiết</a>
                   
                                    </td>
                                </tr>
                            <?php
                            }
                            //   } 
                            ?>
                        </tbody>
                    </table>
                </div>
                <a href="<?= BASE_URL_ADMIN ?>?act=taikhoan-add-form-insert" class="label label-success">Thêm Tài Khoản</a>

            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!-- /.col -->
    </div><!-- /.row -->
</section>