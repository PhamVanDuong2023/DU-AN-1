<?php
// Display error message if set
if (isset($_SESSION['loi']) && $_SESSION['loi']) { ?>
    <div class="alert alert-danger"><?php echo htmlspecialchars($_SESSION['loi'], ENT_QUOTES, 'UTF-8'); ?></div>
<?php
}
// Unset error message after displaying
unset($_SESSION['loi']);
?>

<h3 class="box-title">Thêm tài khoản</h3>
<form role="form" method="post" enctype="multipart/form-data" action="<?= htmlspecialchars(BASE_URL_ADMIN) ?>?act=taikhoan-insert">
    <div class="box-body">
        <div class="form-group">
            <label for="name" class="form-label">Name:</label>
            <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8') : ''; ?>">
        </div>

        <div class="form-group">
            <label for="dia_chi" class="form-label">Địa chỉ:</label>
            <input type="text" class="form-control" id="dia_chi" placeholder="Enter address" name="dia_chi" value="<?php echo isset($_POST['dia_chi']) ? htmlspecialchars($_POST['dia_chi'], ENT_QUOTES, 'UTF-8') : ''; ?>">
        </div>

        <div class="form-group">
            <label for="age" class="form-label">Tuổi:</label>
            <input type="number" class="form-control" id="age" placeholder="Enter age" name="age" value="<?php echo isset($_POST['age']) ? htmlspecialchars($_POST['age'], ENT_QUOTES, 'UTF-8') : ''; ?>">
        </div>

        <div class="form-group">
            <label for="img" class="form-label">Ảnh:</label>
            <input type="file" class="form-control" id="img" name="img">
        </div>

        <div class="form-group">
            <label for="username" class="form-label">Username:</label>
            <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8') : ''; ?>">
        </div>

        <div class="form-group">
            <label for="password" class="form-label">Password:</label>
            <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
        </div>
        <div class="form-group">
            <label for="eamil" class="form-label">Email:</label>
            <input type="eamil" class="form-control" id="eamil" placeholder="Enter email" name="email">
        </div>

        <div class="form-group">
            <label for="vaitro" class="form-label">Vai trò:</label>
            <select name="vaitro" id="vaitro" class="form-control">
                <!-- Example role options, replace or extend with dynamic data -->
                <option value="2" <?= isset($taikhoan1) && $taikhoan1['id_vai_tro'] == 2 ? 'selected' : '' ?>>Admin</option>
                <!-- Add more roles here -->
            </select>
        </div>
    </div>
    
    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="<?= htmlspecialchars(BASE_URL_ADMIN) ?>?act=taikhoan" class="btn btn-danger">Trở lại trang</a>
    </div>
</form>
