<!-- Display error message if available -->
<?php if (isset($_SESSION['loi']) && $_SESSION['loi']) { ?>
<div class="alert alert-danger">
    <?php 
    echo $_SESSION['loi']; 
    unset($_SESSION['loi']); // Clear the error message after displaying it
    ?>
</div>
<?php } ?>

<h3 class="box-title">Cập nhật tài khoản</h3>
<form role="form" method="post" enctype="multipart/form-data" action="<?= BASE_URL_ADMIN ?>?act=taikhoan-update">
    <div class="box-body">
        <input type="hidden" name="id" id="" value="<?= isset($taikhoan1) ? htmlspecialchars($taikhoan1['id']) : '' ?>">
        <div class="form-group">
            <label for="name" class="form-label">Name:</label>
            <input type="text" value="<?= isset($taikhoan1) ? htmlspecialchars($taikhoan1['name']) : '' ?>" class="form-control" id="name" placeholder="Enter name" name="name">
        </div>

        <div class="form-group">
            <label for="username" class="form-label">Username:</label>
            <input type="text" value="<?= isset($taikhoan1) ? htmlspecialchars($taikhoan1['username']) : '' ?>" class="form-control" id="username" placeholder="Enter username" name="username">
        </div>

        <div class="form-group">
            <label for="password" class="form-label">Password:</label>
            <input type="password" value="<?= isset($taikhoan1) ? htmlspecialchars($taikhoan1['password']) : '' ?>" class="form-control" id="password" placeholder="Enter password" name="password">
        </div>

        <div class="form-group">
            <label for="dia_chi" class="form-label">Địa chỉ:</label>
            <input type="text" value="<?= isset($taikhoan1) ? htmlspecialchars($taikhoan1['dia_chi']) : '' ?>" class="form-control" id="dia_chi" placeholder="Enter address" name="dia_chi">
        </div>

        <div class="form-group">
            <label for="age" class="form-label">Tuổi:</label>
            <input type="number" value="<?= isset($taikhoan1) ? htmlspecialchars($taikhoan1['age']) : '' ?>" class="form-control" id="age" placeholder="Enter age" name="age">
        </div>
        <div class="form-group">
            <label for="email" class="form-label">Email:</label>
            <input type="text" value="<?= isset($taikhoan1) ? htmlspecialchars($taikhoan1['email']) : '' ?>" class="form-control" id="email" placeholder="Enter email" name="email">
        </div>
        <img src="../../../img/<?= htmlspecialchars($taikhoan1['img'])?>" alt="" width="100px">
        <div class="form-group">
            <label for="img" class="form-label">Ảnh:</label>
            <input type="file" class="form-control" id="img" name="img" >
        </div>

        

    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="<?= BASE_URL_ADMIN ?>/?act=taikhoan" class="btn btn-danger">Trở lại trang</a>
</form>
  