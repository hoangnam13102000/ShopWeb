<?php
if (isset($_POST['username'], $_POST['password'])) {
  include 'core/list.php';
  if (!isset($list[$_POST['username']])) {
    //upload hinh
    $image = '';
    if (isset($_FILES['image']['error']) && $_FILES['image']['error'] == 0) {
      $image = myupload($_FILES['image'], 'public/upload', $er, 4);
    }
    $list[$_POST['username']] = [
      'image' => $image,
      'username' => $_POST['username'],
      'password' => $_POST['password'],
      'name' => $_POST['name'],
      'address' => $_POST['address'],
      'email' => $_POST['email'],
      'status' => $_POST['status'] = 1,
      'role' => $_POST['role'] = 'Customer'
    ];
    ghifile($path, $list);
    $_SESSION['dangky'] = 'Bạn đã đăng ký tài khoản thành công';
    chuyentrang('index.php?view=sign-in');
  } else {
    $mg = msg('Tên đăng nhập đã được sử dụng.');
  }
} else {
  $mg = msg('Dữ liệu không hợp lệ.');
}
?>
  <? if (isset($_SESSION['dangky'])) {
    echo msg($_SESSION['dangky']);
    unset($_SESSION['dangky']);
  }
  ?>
  <?= $mg ?? '' ?>
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg blur border-radius-xl top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
          <div class="container-fluid ps-2 pe-0">
            <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="index.php">
              MobieShop
            </a>
            <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </span>
            </button>
            <div class="collapse navbar-collapse " id="navigation">
              <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                  <a class="nav-link me-6" href="index.php?view=sign-up">
                    <i class="fas fa-user-circle opacity-6 text-dark me-1"></i>
                    Đăng ký
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link me-6" href="index.php?view=sign-in.php">
                    <i class="fas fa-key opacity-6 text-dark me-1"></i>
                    Đăng nhập
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <!-- End Navbar -->
      </div>
    </div>
  </div>
  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100" style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Đăng ký tài khoản MobieShop</h4>
                  <div class="row mt-3">
                    <div class="col-2 text-center ms-auto">
                      <a class="btn btn-link px-3" href="javascript:;">
                        <i class="fa fa-facebook text-white text-lg"></i>
                      </a>
                    </div>
                    <div class="col-2 text-center px-1">
                      <a class="btn btn-link px-3" href="javascript:;">
                        <i class="fa fa-github text-white text-lg"></i>
                      </a>
                    </div>
                    <div class="col-2 text-center me-auto">
                      <a class="btn btn-link px-3" href="javascript:;">
                        <i class="fa fa-google text-white text-lg"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <form role="form" class="text-start" method="post">
                  <form action="" method="post" enctype="multipart/form-data">
                    <div class="input-group input-group-outline mt-2">
                      <label class="form-label">Hình</label>
                      <input type="file" class="form-control " name="image" id="" aria-describedby="helpId" placeholder="">
                    </div>
                    <div class="input-group input-group-outline mt-2">
                      <label class="form-label">Tên đăng nhập</label>
                      <input type="text" class="form-control" name="username" id="" aria-describedby="helpId" placeholder="">
                    </div>
                    <div class="input-group input-group-outline mt-2">
                      <label class="form-label">Mật khẩu</label>
                      <input type="password" class="form-control" name="password" id="" placeholder="">
                    </div>
                    <div class="input-group input-group-outline mt-2">
                      <label class="form-label">Họ và tên</label>
                      <input type="text" class="form-control" name="name" id="" aria-describedby="helpId" placeholder="">
                    </div>
                    <div class="input-group input-group-outline mt-2">
                      <label class="form-label">Địa chỉ</label>
                      <input type="text" class="form-control" name="address" id="" aria-describedby="helpId" placeholder="">
                    </div>
                    <div class="input-group input-group-outline mt-2">
                      <label class="form-label">Email</label>
                      <input type="text" class="form-control" name="email" id="" aria-describedby="helpId" placeholder="">
                    </div>
                    <div class="text-right mt-2">
                      <button type="submit" class="btn btn-primary"><i class="material-icons opacity-10">person_add</i> Thêm</button>
                      <a href="index.php?view=sign-in" class="btn btn-primary"><i class="material-icons opacity-10">reply</i> Quay về</a>
                    </div>
                  </form>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>