<?php
if(isset($_POST['dathang'])&&$_POST['dathang'])
{
    include 'core/listcart.php';
    $name=$_POST['name']??null;
    if($name!=''&&$_POST['address']!='')
    {
        if($_POST['tong']==0)
        {
            $_SESSION['mgs']='Chưa có sản phẩm nào trong giỏ hàng của bạn';
            chuyentrang('index.php?view=cart');
        }
        else
        {
            $list[$_POST['name']] = [
            'name' => $name,
            'address' => $_POST['address'],
            'tel'=>$_POST['tel'],
            'email' => $_POST['email'],
            'tong' => $_POST['tong'],
        ];
            ghifile($path, $list);
            unset($_SESSION['giohang']);
            $_SESSION['mgs']='Bạn đã đặt hàng thành công';
            chuyentrang('index.php?view=cart');
        }
        
    }
    else{
        $_SESSION['mgs']='Bạn chưa nhập đày đủ thông tin đặt hàng';
        chuyentrang('index.php?view=cart');
    }
}
