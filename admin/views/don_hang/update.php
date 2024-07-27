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
            <label for="exampleInputEmail1">Trạng thái đơn hàng</label>
            <select name="trang_thai_id" id="" class="form-control">
                <?php
                foreach ($trangThaiAll as $key) { ?>

                    <option value="<?php echo $key['id'] ?>" <?php
                       if (
                           $key['id'] < $donHang1['trang_thai_id']
                           || $donHang1['trang_thai_id'] == 9
                           || $donHang1['trang_thai_id'] == 10
                           || $donHang1['trang_thai_id'] == 11
                       ) {
                           echo "disabled";
                       }
                       if ($key['id'] == $donHang1['trang_thai_id']) {
                           echo "selected";
                       }
                       ?>><?php echo $key['ten_trang_thai'] ?>

                    </option>
                    <?php
                }
                ?>
        </div>
        </select><br>
        <label for="exampleInputEmail1">Tên người nhận</label><br>
        <input type="text" name="ten_nguoi_nhan" id="" value="<?= $donHang1['ten_nguoi_nhan'] ?>"><br><br>

        <label for="exampleInputEmail1">sđt</label><br>
        <input type="number" name="sđt_nguoi_nhan" id="" value="<?= $donHang1['sđt_nguoi_nhan'] ?>"><br><br>

        <label for="exampleInputEmail1">Email</label><br>
        <input type="email" name="email_nguoi_nhan" id="" value="<?= $donHang1['email_nguoi_nhan'] ?>"><br><br>

        <label for="exampleInputEmail1">Địa chỉ</label><br>
        <input type="text" name="dia_chi_nguoi_nhan" id="" value="<?= $donHang1['dia_chi_nguoi_nhan'] ?>"><br><br>

        <label for="exampleInputEmail1">Mô tả</label><br>
        <input type="text" name="ghi_chu" id="" value="<?= $donHang1['ghi_chu'] ?>"><br><br>
    </div>
    <div class="box-footer">

        <input type="submit" value="Submit" class="btn btn-primary" name="submit">
    </div>
</form>