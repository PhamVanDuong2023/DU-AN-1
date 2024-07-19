

<!-- hiện thị thông báo lỗi -->
<?php
if (isset($_SESSION['loi'])&&$_SESSION['loi']) { ?>
<div class="alert alert-danger"><?php echo $_SESSION['loi'] ?></div>
<?php
}else{
  echo "";
}

 unset($_SESSION['loi']);
?>
<h3 class="box-title">Thêm danh mục</h3>
<form role="form" method="post">
    <div class="box-body">
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" name="name_danhmuc" class="form-control" id="exampleInputEmail1" placeholder="name">
        </div>
    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>