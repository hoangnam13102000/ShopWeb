<?php
  $title=' '??null;
  if(isset($_GET['view']))
  {
    switch ($_GET['view']) {
      case 'home': {
          $title = 'Trang chủ';
          break;
        }
      case 'cart': {
          $title = 'Giỏ hàng';
          break;
        }
      case 'userlist': {
          $title = 'Quản lý người dùng';
          break;
        }
      case 'productlist': {
          $title = 'Quản lý sản phẩm';
          break;
        }
        case 'orderlist': {
          $title = 'Quản lý giao dịch';
          break;
        }
        case 'sign-up': {
          $title = 'Đăng ký';
          break;
        }
        case 'profile': {
          $title = 'Thông tin tài khoản';
          break;
        }
        case 'sign-in': {
          $title = 'Đăng nhập MobieShop';
          break;
        }
        default:
        {
          $title = 'Trang chủ';
          break;
        }
    }
     $title;
  }
  else
  {
    $title='trang chủ';
  }
  ?>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="apple-touch-icon" sizes="76x76" href="public/assets/img/apple-icon.png">
<link rel="icon" type="image/png" href="public/assets/img/favicon.png">
<title>
  <?=$title?>
</title>
<!--     Fonts and icons     -->
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
<!-- Nucleo Icons -->
<link href="public/assets/css/nucleo-icons.css" rel="stylesheet" />
<link href="public/assets/css/nucleo-svg.css" rel="stylesheet" />
<!-- Font Awesome Icons -->
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
<!-- Material Icons -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
<!-- CSS Files -->
<link id="pagestyle" href="public/assets/css/material-dashboard.css?v=3.0.2" rel="stylesheet" />