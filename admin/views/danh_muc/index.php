<!-- hiển thị thông báo thành công -->
<?php
if (isset($_SESSION['thong_bao']) && $_SESSION['thong_bao'] != "") { ?>
  <div class="alert alert-success"><?php echo $_SESSION['thong_bao'] ?></div>
  <?php
  unset($_SESSION['thong_bao']);

} else {
  echo "";
}


if (isset($_SESSION['loi']) && $_SESSION['loi'] != "") { ?>
  <div class="alert alert-danger"><?php echo $_SESSION['loi'] ?></div>
  <?php
  unset($_SESSION['loi']);

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
          <h3 class="box-title">Danh mục</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>id</th>
                <th>Name</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $stt = 0;
              foreach ($listDanhMuc as $key) {
                $stt++;
                ?>
                
                <tr>
                  <td><?php echo $stt ?></td>
                  <td><?php echo $key['name_danhmuc'] ?></td>
                  <td>
                    <a href="<?= BASE_URL_ADMIN ?>?act=danhmuc-edit&id=<?php echo $key['id'] ?>"
                      class="label label-warning">Sửa</a>
                    <a href="<?= BASE_URL_ADMIN ?>?act=danhmuc-delete&id=<?php echo $key['id'] ?>"
                      class="label label-danger" onclick="return confirm('Bạn có chắc muốn xóa không ?')">Xóa</a>
                  </td>
                </tr>
                <?php
              }
              ?>
            </tbody>
          </table>
          <div>
            <a href="<?= BASE_URL_ADMIN ?>?act=danhmuc-add-form-insert" class="label label-success">Thêm Danh Mục</a>
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