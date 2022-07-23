<!--
=========================================================
* Material Dashboard 2 - v=3.0.2
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<?php
require ('libs/functions.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include('widgets/head.php'); ?>
  
</head>

<body class="g-sidenav-show  bg-gray-200">
  <?php if(islogin('trangthai1'))
  {
    include('widgets/menu.php');
  } 
  else
  {
    include('widgets/menuUser.php');
  }
   ?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <?php include('widgets/navbar.php'); ?>
    <!-- End Navbar -->
    <?php 
    $v=$_GET['view']??'home';
    $path='pages/'.$v.'.php';
    if(file_exists($path))
    {
      include($path); 
    }
    else
    {
      include('pages/404.php');
    }
    
    ?>
  </main>
  
  <?php include('widgets/setting.php'); ?>
  <!--   Core JS Files   -->
  <?php include('widgets/js.php'); ?>
</body>

</html>
<?php ob_end_flush();?>