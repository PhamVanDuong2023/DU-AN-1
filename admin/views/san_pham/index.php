<!-- hiển thị thông báo thành công -->
<?php
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
// if (isset($_SESSION['loi'])&&$_SESSION['loi']) { 
?>
<!-- <div class="alert alert-danger"><?php
//  echo $_SESSION['loi'] 
?></div> -->
<?php
// unset($_SESSION['loi']);
// }else{
//   echo "";
// }

?>
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Sản Phẩm</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>id</th>
                <th>Tên Sản Phẩm</th>
                <th>Giá</th>
                <th>Số Lượng</th>
                <th>Mô tả</th>
                <th>Ảnh</th>
                <th>Danh Mục</th>
                <th>Thao tác</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $stt = 0;
              foreach ($listsp as $key) {
                $stt++;
                ?>
                <tr>
                  <td><?php echo $key['id'] ?></td>
                  <td><?php echo $key['name_sp'] ?></td>
                  <td><?php echo $key['price_sp'] ?></td>
                  <td><?php echo $key['soluong_sp'] ?></td>
                  <td><?php echo $key['mota_sp'] ?></td>
                  <td>
                     <img src="<?= BASE_URL . $key['img_sp'] ?>"  alt="" style="width: 50px; height: 50px; object-fit: cover; overflow: hidden;" ></td>
                  <td><?php echo $key['name_danhmuc'] ?></td>
                  <td>
                    <a href="<?= BASE_URL_ADMIN ?>?act=sanpham-edit&id=<?php echo $key['id'] ?>"
                      class="label label-warning">Sửa</a>
                    <a href="<?= BASE_URL_ADMIN ?>?act=sanpham-xoa&id=<?php echo $key['id'] ?>"
                      class="label label-danger" onclick="return confirm('Ban co chac chan xoa khong')" >Xóa</a>
                  </td>
                </tr>
                <?php
              }
              ?>
            </tbody>
          </table>
          <div>
            <a href="<?= BASE_URL_ADMIN ?>?act=form-them-san-pham" class="label label-success">Thêm Sản Phẩm</a>
          </div>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section>
<script>
  $(document).ready(function () {
    $('#example2').DataTable();
  });
</script>
