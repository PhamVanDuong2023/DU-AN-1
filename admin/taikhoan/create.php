<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Thêm tài khoản</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Thêm mới tài khoản</h6>
    </div>
    <div class="card-body">
       <form action="" method="POST">
        <div class="row">
            <div class="col-md-6"> <div class="mb-3 mt-3">
       <label for="name" class="form-label">Name:</label>
       <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
       </div>
       <div class="mb-3 mt-3">
       <label for="email" class="form-label">Email:</label>
       <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
       </div>
       <div class="mb-3 mt-3">
       <label for="password" class="form-label">Password:</label>
       <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
       </div>
       <div class="mb-3 mt-3">
       <label for="username" class="form-label">Username:</label>
       <input type="text" class="form-control" id="username" placeholder="Enter username" name="username">
       </div></div>
            <div class="col-md-6"><div class="mb-3 mt-3">
       <label for="diachi" class="form-label">Địa chỉ:</label>
       <input type="text" class="form-control" id="diachi" placeholder="Enter diachi" name="diachi">
       </div>
       <div class="mb-3 mt-3">
       <label for="sdt" class="form-label">Số điện thoại:</label>
       <input type="number" class="form-control" id="sdt" placeholder="Enter sdt" name="sdt">
       </div>
       <div class="mb-3 mt-3">
       <label for="age" class="form-label">Tuổi:</label>
       <input type="text" class="form-control" id="age" placeholder="Enter age" name="age">
       </div>
       <div class="mb-3 mt-3">
       <label for="vaitro" class="form-label">Vai trò:</label>
       <select name="vaitro" id="vaitro" class="form-control">
       
        <option value="1">Admin</option>
        <option value="0">Member</option>
       </select>
       </div></div>
        </div>
      
       
       <button type="submit" class="btn btn-primary">Submit</button>
       <a href="<?=BASE_URL_ADMIN?>/?act=taikhoan"class="btn btn-danger">Trờ lại trang</a>
       </form>
    </div>
</div>

</div>
