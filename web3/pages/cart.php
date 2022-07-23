<?php
include 'core/listcart.php';
if(!islogin('trangthai2'))
{
    $_SESSION['mgs1']='Bạn chưa đăng nhập';
    chuyentrang('index.php?view=home');
}
if (!isset($_SESSION['giohang'])) {
    $_SESSION['giohang'] = [];
}
if (isset($_GET['Del']) && ($_GET['Del']) == 1) {
    unset($_SESSION['giohang']);
}
if (isset($_GET['Delid']) && ($_GET['Delid']) >= 0) {
    array_splice($_SESSION['giohang'], $_GET['Delid'], 1);
}
if (isset($_POST['addcart']) && ($_POST['addcart'])) {
    $hinh = $_POST['image'];
    $tensp = $_POST['tensp'];
    $gia = $_POST['gia'];
    $soluong = $_POST['soluong'];
    $flag = 0;
    for ($i = 0; $i < sizeof($_SESSION['giohang']); $i++) {

        if ($_SESSION['giohang'][$i][1] == $tensp) {
            $flag = 1;
            $soluongmoi = $soluong + $_SESSION['giohang'][$i][3];
            $_SESSION['giohang'][$i][3] = $soluongmoi;
            break;
        }
    }
    if ($flag == 0) {
        $sp = [$hinh, $tensp, $gia, $soluong];
        $_SESSION['giohang'][] = $sp;
    }
}
?>
<?php
if (isset($_SESSION['mgs'])) {
    echo msg($_SESSION['mgs']);
    unset($_SESSION['mgs']);
}
?>
<div>
    <h3>Thông tin nhận hàng</h3>
    <form action="index.php?view=dathang" method="post">
        <div class="input-group input-group-outline mt-2">
            <label class="form-label">Tên khách hàng</label>
            <input type="text" class="form-control" name="name" id="" aria-describedby="helpId" placeholder="">
        </div>
        <div class="input-group input-group-outline mt-2">
            <label class="form-label">Địa chỉ</label>
            <input type="text" class="form-control" name="address" id="" aria-describedby="helpId" placeholder="">
        </div>
        <div class="input-group input-group-outline mt-2">
            <label class="form-label">Số điện thoại</label>
            <input type="text" class="form-control" name="tel" id="" aria-describedby="helpId" placeholder="">
        </div>
        <div class="input-group input-group-outline mt-2">
            <label class="form-label">Email</label>
            <input type="text" class="form-control" name="email" id="" aria-describedby="helpId" placeholder="">
        </div>
</div>
<div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
    <h6 class="text-white text-capitalize ps-3">Giỏ hàng của bạn</h6>
</div>
<div class="container-fluid py-4">
    <div class="card-body px-0 pb-2">
        <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-secondary">STT</th>
                        <th class="text-secondary">Hình</th>
                        <th class="text-secondary">Tên sản phẩm</th>
                        <th class="text-secondary">Giá</th>
                        <th class="text-secondary">Số lượng</th>
                        <th class="text-secondary">Thành tiền</th>
                        <th class="text-secondary">Tác vụ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($_SESSION['giohang']) && is_array($_SESSION['giohang'])) {
                        (int)$tong = 0;
                        for ($i = 0; $i < sizeof($_SESSION['giohang']); $i++) {
                            (int)$tt = (int)$_SESSION['giohang'][$i][2] * (int)$_SESSION['giohang'][$i][3];
                            (int)$tong += (int)$_SESSION['giohang'][$i][2] * (int)$_SESSION['giohang'][$i][3];
                    ?> 
                            <tr>
                                <td><?= $i + 1 ?></td>
                                <td>
                                    <div>
                                        <img width="100" src="<?= showimg($_SESSION['giohang'][$i][0]) ?>" class="img-fluid " alt="">
                                    </div>
                                </td>
                                <td>
                                    <p class="text-secondary font-weight-bold"><?= $_SESSION['giohang'][$i][1] ?>
                                </td>
                                <td>
                                    <p class="text-secondary font-weight-bold"><?= number_format((int)($_SESSION['giohang'][$i][2])) ?> VNĐ
                                </td>
                                <td>
                                    <p class="text-secondary font-weight-bold"><?= $_SESSION['giohang'][$i][3] ?>
                                </td>
                                <td>
                                    <p class="text-secondary font-weight-bold"><?= number_format($tt) ?> VNĐ
                                </td>
                                <td><a href="index.php?view=cart&Delid=<?= $i ?>" class="btn btn-danger">Xóa <i class="fas fa-trash-alt"></i></a></td>
                            <?php
                        }
                            ?>
                            </tr>
                            <tr>
                                <th colspan="6">Tổng hóa đơn:</th>
                                <td>
                                    <div><?= number_format((int)$tong) ?> VNĐ</div>
                                </td>
                            </tr>
                            <input type="hidden" name="tong" value="<?= $tong ?>">
                        <?php
                    }
                        ?>
                </tbody>
            </table>
            <div class="text-right">
                <a href="index.php?view=cart&Del=1" class="btn btn-danger">Xóa giỏ hàng <i class="fas fa-trash-alt"></i></a>
                <input type="submit" class="btn btn-primary" name="dathang" value="Đồng ý đặt hàng">
            </div>
            </form>
        </div>
    </div>
</div>