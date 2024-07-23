<!-- hiển thị thông báo thành công -->
<?php
if (isset($_SESSION['thong_bao'])&&$_SESSION['thong_bao']!="") { ?>
<div class="alert alert-success"><?php echo $_SESSION['thong_bao'] ?></div>
<?php
 unset($_SESSION['thong_bao']);

}else{
  echo "";
}

?>
<!-- hiện thị thông báo lỗi -->
<?php
if (isset($_SESSION['loi'])&&$_SESSION['loi']) { ?>
<div class="alert alert-danger"><?php echo $_SESSION['loi'] ?></div>
<?php
unset($_SESSION['loi']);
}else{
  echo "";
}

?>
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Danh sánh đơn hàng</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>id</th>
                <th>Mã đơn hàng</th>
                <th>Tên người nhận</th>
                <th>Số điện thoại</th>
                <th>Ngày đặt</th>
                <th>Tổng tiền </th>
                <th>Trạng thái</th>
                <th>Action</th>
              </tr>
            </thead>
            <?php
              $stt = 0;
              foreach ($listDonHang as $key => $donHang) {
                $stt++;
                ?>
                <tr>
                  <td><?php echo $stt ?></td>
                  <td><?php echo $donHang['ma_don_hang'] ?></td>
                  <td><?php echo $donHang['ten_nguoi_nhan'] ?></td>
                  <td><?php echo $donHang['so_dien_thoai'] ?></td>
                  <td><?php echo $donHang['ngay_dat'] ?></td>
                  <td><?php echo $donHang['tong_tien'] ?></td>
                  <td><?php echo $donHang['ten_trang_thai'] ?></td>
                  <td>
                    <a href="<?=BASE_URL_ADMIN ."act=chi-tiet-don-hang&id_don_hang" . $sanPham['id']?>">
                        <button class="btn btn primary"><i class="far fa-eye"></i></button>
                    </a>
                    <a href="<?=BASE_URL_ADMIN ."act=sua-don-hang&id_don_hang" . $sanPham['id']?>">
                        <button class="btn btn warning"><i class="far fa-eye"></i></button>
                    </a>
                  </td>
                </tr>
                <?php
              }
              ?>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /
