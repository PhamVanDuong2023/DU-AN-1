<!-- hiện thị thông báo lỗi -->
<?php
if (isset($_SESSION['loi'])&&$_SESSION['loi']) { ?>
<div class="alert alert-danger"><?php echo $_SESSION['loi'] ?></div>
<?php

unset($_SESSION['loi']);}else{
  echo "";
}

?>
<h3 class="box-title">Cập nhật danh mục</h3>
<form role="form" method="post" action="<?=BASE_URL_ADMIN?>?act=danhmuc-update">
    <div class="box-body">
        <div class="form-group">
            <input type="hidden" name="id" id="" value="<?php if(isset($danhmuc1)&&$danhmuc1){echo $danhmuc1['id'];}else{echo "";} ?>">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" name="name_danhmuc" value="<?php if(isset($danhmuc1)&&$danhmuc1){echo $danhmuc1['name_danhmuc'];}else{echo "";} ?>" class="form-control" id="exampleInputEmail1" placeholder="name">
        </div>
    <div class="box-footer">
        
        <input type="submit" value="Submit" class="btn btn-primary" name="submit">
    </div>
</form>