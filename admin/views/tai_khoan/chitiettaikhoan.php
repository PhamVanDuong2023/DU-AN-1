<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết tài khoản</title>
    <link rel="stylesheet" href="path/to/your/css/file.css">
    <style>
        .profile-image {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            border: 2px solid #ddd;
        }
        .invoice-info {
            margin: 20px 0;
        }
        .invoice-info address {
            font-size: 16px;
        }
        .badge-success {
            background-color: #28a745;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
        }
        .comments-section {
            margin-top: 20px;
        }
        .comments-section ul {
            list-style-type: none;
            padding: 0;
        }
        .comments-section li {
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <!-- Content Header -->
    <section class="content-header">
        <h1>Chi tiết tài khoản</h1>
        <form action="<?= BASE_URL_ADMIN ?>?act=chitiet" method="post" enctype="multipart/form-data" style="text-align: right;">
            <!-- Thêm nội dung form nếu cần -->
        </form>
    </section>

    <!-- Main content -->
    <section class="invoice">
        <!-- Title row -->
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">
                    <i class="fa fa-globe"></i> Shop Thời Trang DPL.
                </h2>
            </div>
        </div>

        <!-- Info row -->
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
                <b>Thông tin tài khoản</b>
                <address>
                    <img src="<?= BASE_URL . htmlspecialchars($TaiKhoan['img']) ?>" alt="Ảnh đại diện" class="profile-image"><br><br>
                    Tên: <?= htmlspecialchars($TaiKhoan['name']) ?><br>
                    Địa chỉ: <?= htmlspecialchars($TaiKhoan['dia_chi']) ?><br>
                    Email: <?= htmlspecialchars($TaiKhoan['email']) ?><br>
                    Tên đăng nhập: <?= htmlspecialchars($TaiKhoan['username']) ?><br>
                </address>
            </div>

            <div class="col-sm-4 invoice-col">
                <b>Thông tin khác</b>
                <address>
                    <b>Tuổi:</b> <?= htmlspecialchars($TaiKhoan['age']) ?><br>
                    <b>Vai trò:</b> <span class="badge badge-success"><?= htmlspecialchars($TaiKhoan['name_vaitro']) ?></span><br>
                </address>
            </div>
        </div>

        <!-- Comments section -->
        <div class="comments-section">
            <h3>Bình luận</h3>
            <?php if (!empty($binhLuan)): ?>
                <ul>
                    <?php foreach ($binhLuan as $binhLuan1): ?>
                        <li>
                            <p><strong>ID:</strong> <?= htmlspecialchars($binhLuan1['id']) ?></p>
                            <p><strong>Nội dung:</strong> <?= htmlspecialchars($binhLuan1['noi_dung']) ?></p>
                            <p><strong>Ngày bình luận:</strong> <?= htmlspecialchars($binhLuan1['ngay_bl']) ?></p>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>Không có bình luận nào.</p>
            <?php endif; ?>
        </div>
    </section>
</body>
</html>
