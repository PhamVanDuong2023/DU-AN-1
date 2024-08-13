<?php
// Hiển thị thông báo thành công
if (isset($_SESSION['thong_bao']) && !empty($_SESSION['thong_bao'])): ?>
    <div class="alert alert-success">
        <?php echo htmlspecialchars($_SESSION['thong_bao'], ENT_QUOTES, 'UTF-8'); ?>
    </div>
    <?php unset($_SESSION['thong_bao']);
endif;
?>

<!-- Hiển thị thông báo lỗi -->
<?php
if (isset($_SESSION['loi']) && !empty($_SESSION['loi'])): ?>
    <div class="alert alert-danger">
        <?php echo htmlspecialchars($_SESSION['loi'], ENT_QUOTES, 'UTF-8'); ?>
    </div>
    <?php unset($_SESSION['loi']);
endif;
?>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title" style="text-align: center; font-weight: 20000;">Quản lý bình luận</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr style="text-align: center;">
                                <th>ID</th>
                                <th>Nội dung</th>
                                <th>Tên sản phẩm</th>
                                <th>Người bình luận</th>
                                <th>Ngày bình luận</th>
                                <th style="width: 200px;">Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $stt = 0;
                            // Kiểm tra xem biến có phải là mảng không
                            // $listbinhluan = isset($listbinhluan) && is_array($listbinhluan) ? $listbinhluan : [];

                            foreach ($listbinhluan as $bl): 
                                $stt++;
                            ?>
                                <tr style="text-align: center;">
                                    <td><?php echo $stt; ?></td>
                                    <td><?php echo htmlspecialchars($bl['noi_dung']); ?></td>
                                    <td><?php echo htmlspecialchars($bl['name_sp']); ?></td>
                                    <td><?php echo htmlspecialchars($bl['name']); ?></td>
                                    <td><?php echo htmlspecialchars($bl['ngay_bl']); ?></td>
                                    <td>
                                        <a href="<?= BASE_URL_ADMIN ?>?act=binhluan-delete&id=<?php echo htmlspecialchars($bl['id']); ?>" class="label label-danger" onclick="return confirm('Bạn có chắc muốn xóa không ?')">Xóa</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section>
