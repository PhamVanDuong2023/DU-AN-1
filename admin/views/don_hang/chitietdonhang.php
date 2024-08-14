<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Quản lí danh sách đơn hàng - Đơn hàng
        <small><?= $don_hang['ma_don_hang'] ?></small>
    </h1>
    <div style="margin-left:750px;">
        <form action="" method="post">
            <select name="" id="">
                <?php foreach ($listTrangThaiDonHang as $trangThai): ?>
                    <option value="<?php echo $trangThai['id'] ?>" <?php
                       if (
                        $trangThai['id'] < $don_hang['trang_thai_id']
                        || $don_hang['trang_thai_id'] == 9
                        || $don_hang['trang_thai_id'] == 10
                        || $don_hang['trang_thai_id'] == 11
                    ) {
                        echo "disabled";
                    }
                    if($trangThai['id']==$don_hang['trang_thai_id']){
                        echo "selected";
                    }
                       ?>
                       
                       ><?php echo $trangThai['ten_trang_thai'] ?>

                    </option>
                <?php endforeach; ?>
            </select>
            </select>
        </form>
    </div>
</section>

<div class="pad margin no-print">

    <?php
    if ($don_hang['trang_thai_id'] == 7 || $don_hang['trang_thai_id'] == 8 || $don_hang['trang_thai_id'] == 9) {
        $style = "success";
    }else if ($don_hang['trang_thai_id'] >= 1 || $don_hang['trang_thai_id'] <= 6) {
        $style = "warning";
    }else {
        $style = "danger";
    }
    ?>
    <div class="callout callout-<?= $style ?>" style="margin-bottom: 0!important;">
        Đơn hàng : <?= $don_hang['ten_trang_thai'] ?>
    </div>
</div>

<!-- Main content -->
<section class="invoice">
    <!-- title row -->
    <div class="row">
        <div class="col-xs-12">
            <h2 class="page-header">
                <i class="fa fa-globe"></i> Shop Thời Trang DPL.
                <small class="pull-right">Ngày Đặt : <?= $don_hang['ngay_dat'] ?></small>
            </h2>
        </div><!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
            <b> Thông tin người đặt</b>
            <address>
                Tên :<?= $don_hang['name'] ?><br>
                Địa chỉ : <?= $don_hang['dia_chi'] ?><br>
                Email : <?= $don_hang['email'] ?><br>
            </address>
        </div><!-- /.col -->
        <div class="col-sm-4 invoice-col">
            <b>Người nhận</b>
            <address>
                Tên :<?= $don_hang['ten_nguoi_nhan'] ?><br>
                Địa chỉ : <?= $don_hang['dia_chi_nguoi_nhan'] ?><br>
                SĐT : <?= $don_hang['sđt_nguoi_nhan'] ?><br>
                Email : <?= $don_hang['email_nguoi_nhan'] ?><br>
            </address>
        </div><!-- /.col -->
        <div class="col-sm-4 invoice-col">
            <b>Thông tin</b><br />
            <br />
            <address>
                <b>Mã đơn hàng :</b> <?= $don_hang['ma_don_hang'] ?><br />
                <b>Tổng tiền :</b> <?= number_format($don_hang['tong_tien'], 0, '.', ',') ?> đ<br />
                <b>Ghi chú :</b> <?= $don_hang['ghi_chu'] ?><br />
            </address>
        </div><!-- /.col -->
    </div><!-- /.row -->

    <!-- Table row -->
    <div class="row">
        <div class="col-xs-12 table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Stt</th>
                        <th>Tên sản phẩm</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>Thành Tiền</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
                <?php $tong_tien = 0; ?>
                <?php
                foreach ($sanPhamDonHang as $key => $sanPham): ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= $sanPham['name_sp'] ?></td>
                        <td><?= number_format($sanPham['price_sp'], 0, '.', ',') ?></td>
                        <td><?= $sanPham['so_luong'] ?></td>
                        <td><?= number_format($sanPham['thanh_tien'], 0, '.', ',') ?></td>
                    </tr>
                    <?php $tong_tien += $sanPham['thanh_tien']; ?>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div><!-- /.col -->
    </div><!-- /.row -->

    <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
            <p class="lead">Ngày đặt hàng : <?= $don_hang['ngay_dat'] ?> </p>
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th style="width:50%">Thành tiền :</th>
                        <td><?= number_format($tong_tien, 0, '.', ',') ?> đ</td>
                    </tr>
                    <tr>
                        <th>Vận chuyển :</th>
                        <td>50.000 đ</td>
                    </tr>
                    <tr>
                        <th>Tổng tiền :</th>
                        <td><?= number_format($tong_tien + 50000, 0, '.', ',') ?> đ</td>
                    </tr>
                </table>
            </div>
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->
<div class="clearfix"></div>