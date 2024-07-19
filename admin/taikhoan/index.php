<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"><?=$title?>
  <a href="<?=BASE_URL_ADMIN?>/?act=taikhoan-create"class="btn btn-primary">Thêm mới</a>
                    </h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th> Name</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Tuổi</th>
                        <th>Password</th>
                        <th>Vai trò</th>
                        <th style="width: 200px;">Chức năng</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Name</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Tuổi</th>
                        <th>Password</th>
                        <th>Vai trò</th>
                        <th style="width: 200px;">Chức năng</th>
                    </tr>
                </tfoot>
                <tbody>
                   
                    
                    <?php foreach ($taikhoan as $tkhoan):?>
                    <tr>
                        <td><?=$tkhoan['id']?></td>
                        <td><?=$tkhoan['username']?></td>
                        <td><?=$tkhoan['email']?></td>
                        <td><?=$tkhoan['name']?></td>
                        <td><?=$tkhoan['dia_chi']?></td>
                        <td><?=$tkhoan['phone']?></td>
                        <td><?=$tkhoan['age']?></td>
                        <td><?=$tkhoan['password']?></td>
                        <td><?=$tkhoan['vai_tro'] ? ' <span class="badge badge-success">Admin</span>' : '<span class="badge badge-warning">Member</span>'?></td>
                        <td><a href="<?=BASE_URL_ADMIN?>/?act=taikhoan-detail&id=<?=$tkhoan['id']?>"
                        class="btn btn-info">Show</a>
                        <a href="<?=BASE_URL_ADMIN?>/?act=taikhoan-update&id=<?=$tkhoan['id']?>"
                        class="btn btn-warning">Sửa</a>

                        <a href="<?=BASE_URL_ADMIN?>/?act=taikhoan-delete&id=<?=$tkhoan['id']?>"
                        onclick="return confirm('Bạn có chắc chắn xóa không?')"
                        class="btn btn-danger">Xóa</a></td>
                    </tr>
                   <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
