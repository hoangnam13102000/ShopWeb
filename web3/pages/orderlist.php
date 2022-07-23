<?php
if (!islogin('trangthai1')) {
    chuyentrang('login.php');
}
include 'core/listcart.php';
?>
<div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
    <h6 class="text-white text-capitalize ps-3">Danh sách giao dịch</h6>
</div>
<div class="container-fluid py-4">
    <div class="card-body px-0 pb-2">
        <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-secondary">Tên khách hàng</th>
                        <th class="text-secondary">Địa chỉ</th>
                        <th class="text-secondary">Số điện thoại</th>
                        <th class="text-secondary">Email</th>
                        <th class="text-secondary">Tổng hóa đơn</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($list as $products) {
                    ?>
                        <tr>
                            <td>
                                <p class="text-secondary font-weight-bold"><?=$products['name']?></p>
                            </td>
                            <td>
                                <p class="text-secondary font-weight-bold"><?=$products['address']?>
                            </td>
                            <td>
                                <p class="text-secondary font-weight-bold"><?=$products['tel']?>
                            </td>
                            <td>
                                <p class="text-secondary font-weight-bold"><?=$products['email']?>
                            </td>
                            <td>
                                <p class="text-secondary font-weight-bold"><?=number_format($products['tong'])?> VNĐ
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include('widgets/footer.php'); ?>