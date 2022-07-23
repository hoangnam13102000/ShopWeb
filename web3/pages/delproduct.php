<?php
include 'libs/quanly.php';
 include 'libs/oppProduct.php';
 $product=new quanlyproduct($image, $_GET['masp'],$_POST['style'], $_POST['tensp'],$_POST['hang'], $_POST['gia'],$_POST['trangthai'], $_POST['noibat']);
 $product->delete();