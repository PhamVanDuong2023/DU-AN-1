<section class="sidebar">
  <div class="user-panel">
    <div class="pull-left image">
    </div>
    <div class="pull-left info">
      <p><?= $_SESSION['user'] ?></p>

      <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
  </div>

  <ul class="sidebar-menu">

    <li class="header">Danh Mục</li>
    <li class="active treeview">
    <li class="active"><a href="<?= BASE_URL_ADMIN ?>"><i class="fa fa-circle-o"></i> Home </a></li>
    </li>
    <li>
      <a href="<?= BASE_URL_ADMIN . "?act=danhmuc" ?>">
        <i class="fa fa-th"></i> <span>Danh Mục</span>
      </a>
    </li>
    <li>
      <a href="<?= BASE_URL_ADMIN . "?act=taikhoan" ?>">
        <i class="fa fa-th"></i> <span>Tài Khoản</span>
      </a>
    </li>
    <li>
      <a href="<?= BASE_URL_ADMIN . "?act=don-hang" ?>">
        <i class="fa fa-th"></i> <span>Đơn Hàng</span>
      </a>
    </li>
    <li>
      <a href="<?= BASE_URL_ADMIN . "?act=bieu-do" ?>">
        <i class="fa fa-th"></i> <span>Biểu Đồ</span>
      </a>
    </li>
</section>