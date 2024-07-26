<!-- hiện thị thông báo lỗi -->
<?php
if (isset($_SESSION['loi']) && $_SESSION['loi']) { ?>
    <div class="alert alert-danger"><?php echo $_SESSION['loi'] ?></div>
    <?php

    unset($_SESSION['loi']);
} else {
    echo "";
}

?>
<h3 class="box-title">Cập nhật đơn hàng</h3>
<form role="form" method="post" action="<?= BASE_URL_ADMIN ?>?act=donhang-update">
    <div class="box-body">
        <div class="form-group">
            <input type="hidden" name="id" id="" value="<?php if (isset($donHang1) && $donHang1) {
                echo $donHang1['id'];
            } else {
                echo "";
            } ?>">
            <label for="exampleInputEmail1">Name</label>
            <select name="trang_thai_id" id="" class="form-control">
                <?php
                foreach ($trangThaiAll as $key) { ?>

                    <option value="<?php echo $key['id'] ?>" <?php
                       if ($key['id'] == $donHang1['trang_thai_id']) {

                           echo "selected";
                       }
                       ?>><?php echo $key['ten_trang_thai'] ?>

                    </option>
                    <?php
                }

                ?>
            </select>
        </div>
        <div class="box-footer">

            <input type="submit" value="Submit" class="btn btn-primary" name="submit">
        </div>
</form>