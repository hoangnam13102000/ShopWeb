<!--
=========================================================
* Material Dashboard 2 - v3.0.2
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<?php
if (isset($_POST['username'], $_POST['password'])) {
  include 'core/list.php';

  $user = $list[$_POST['username']] ?? null;
  if ($user &&  $user['password'] == $_POST['password']) {

    if ($user['status'] == 1) {
      $_SESSION['image'] = $user['image'];
      $_SESSION['username'] = $user['username'];

      if ($user['role'] == 'Admin') {
        $_SESSION['trangthai1'] = true;
        chuyentrang('index.php?view=userlist');
      } else {
        $_SESSION['trangthai2'] = true;
        chuyentrang('index.php');
      }
    } else {
      $mg = msg('Tài khoản của bạn đang bị khóa');
    }
  } else {
    $mg = msg('Tài khoản và mật khẩu không đúng');
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include('widgets/head.php'); ?>
  <title>
    Đăng nhập MobieShop
  </title>
</head>

<body class="bg-gray-200">
<? if(isset($_SESSION['dangky']))
    {
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
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Đăng nhập MobieShop</h4>
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
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label">Tên đăng nhập</label>
                    <input type="text" class="form-control" name="username">
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Mật khẩu</label>
                    <input type="password" class="form-control" name="password">
                  </div>
                  <div class="form-check form-switch d-flex align-items-center mb-3">
                    <input class="form-check-input" type="checkbox" id="rememberMe">
                    <label class="form-check-label mb-0 ms-2" for="rememberMe" name="nho" value="1">Nhớ tài khoản</label>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Đăng nhập</button>
                  </div>
                  <p class="mt-4 text-sm text-center">
                    Bạn chưa có tài khoản?
                    <a href="index.php?view=sign-up" class="text-primary text-gradient font-weight-bold">Đăng ký</a>
                  </p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <!--   Core JS Files   -->
  <?php include('widgets/js.php'); ?>
</body>
