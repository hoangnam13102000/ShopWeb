<?php
if (!islogin('trangthai1')) {
    chuyentrang('login.php');
}
if(!isset($_GET['username']) || !$_GET['username'])
{
    chuyentrang('index.php?view=userlist');
}
include 'core/list.php';
//tim user delete
$user = $list[$_GET['username']]??false;
if(!$user)
{
    chuyentrang('index.php?view=userlist');
}
unset($list[$_GET['username']]);
ghifile($path,$list);
chuyentrang('index.php?view=userlist');