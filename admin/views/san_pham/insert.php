<?php
if (isset($_SESSION['thong_bao'])&&$_SESSION['thong_bao']) { ?>
<div class="alert alert-success"><?php echo $_SESSION['thong_bao'] ?></div>
<?php
unset($_SESSION['thong_bao']);
}

?>
<!-- hiện thị thông báo lỗi -->
<?php
if (isset($_SESSION['loi'])&&$_SESSION['loi']) { ?>
<div class="alert alert-danger"><?php echo $_SESSION['loi'] ?></div>
<?php
// unset($_SESSION['loi']);
// session_destroy();
unset($_SESSION['loi']);


}
else{
  echo "";
}

 
?>
<h3 class="box-title">Thêm sản phẩm</h3>
<form role="form" method="post" action="" enctype="multipart/form-data">
    <div class="box-body">
        <div class="form-group">
            <label>Tên sản phẩm</label>
            <input type="text" name="name_sp" class="form-control" placeholder="Nhập tên sản phẩm">
            <?php if (isset($errors['name_sp'])) { ?>
            <p class="text-danger"><?= $errors['name_sp']?> </p>
            <?php } ?>
        </div>

        <div class="form-group">
            <label>Giá sản phẩm</label>
            <input type="number" name="price_sp" class="form-control" placeholder="giá">
            <?php if (isset($errors['price_sp'])) { ?>
            <p class="text-danger"><?= $errors['price_sp']?> </p>
            <?php } ?>
        </div>

        <div class="form-group">
            <label>Số lượng</label>
            <input type="number" name="soluong_sp" class="form-control" placeholder="nhập số lượng">
            <?php if (isset($errors['soluong_sp'])) { ?>
            <p class="text-danger"><?= $errors['soluong_sp']?> </p>
            <?php } ?>
        </div>

        <div class="form-group">
            <label>Mô tả</label>
            <input type="text" name="mota_sp" class="form-control" placeholder="nhập mô tả">
            <?php if (isset($errors['mota_sp'])) { ?>
            <p class="text-danger"><?= $errors['mota_sp']?> </p>
            <?php } ?>
        </div>


        <div class="form-group">
            <label>Ảnh</label>
            <input type="file" name="img_sp" class="form-control" >
            <?php if (isset($errors['img_sp'])) { ?>
            <p class="text-danger"><?= $errors['img_sp']?> </p>
            <?php } ?>
        </div>

        <div class="form-group">
            <label>Danh mục</label>
            <select name="id_danhmuc" id="">
                <?php foreach($listdanhmuc as $dm): ?>
                <option value="<?=$dm['id']?>"><?=$dm['name_danhmuc']?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
</form>