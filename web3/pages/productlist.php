<?php
if (!islogin('trangthai1')) {
    chuyentrang('login.php');
}
include 'core/listProduct.php';
?>
<div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
    <h6 class="text-white text-capitalize ps-3">Danh sách sản phẩm</h6>
</div>
<div class="text-right">
    <a name="" id="" class="btn btn-dark mt-2" href="index.php?view=addproduct" role="button"><i class="material-icons opacity-10">add_box</i> Thêm sản phẩm</a>
</div>
<div class="container-fluid py-4">
    <div class="card-body px-0 pb-2">
        <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-secondary">Hình</th>
                        <th class="text-secondary">Mã sản phẩm</th>
                        <th class="text-secondary">Loại sản phẩm</th>
                        <th class="text-secondary">Tên sản phẩm</th>
                        <th class="text-secondary">Hãng</th>
                        <th class="text-secondary">Giá</th>
                        <th class="text-secondary">Trạng thái</th>
                        <th class="text-secondary">Nổi bật</th>
                        <th class="text-secondary">Tác vụ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($list as $products) {
                    ?>
                        <tr>
                            <td>
                                <div>
                                    <img width="100" src="<?= showimg($products['image']) ?>" class="img-fluid" alt="" >
                                </div>
                            </td>
                            <td>
                                <p class="text-secondary font-weight-bold"><?=$products['masp']?></p>
                            </td>
                            <td>
                                <p class="text-secondary font-weight-bold"><?=$products['style']?>
                            </td>
                            <td>
                                <p class="text-secondary font-weight-bold"><?=$products['tensp']?>
                            </td>
                            <td>
                                <p class="text-secondary font-weight-bold"><?=$products['hang']?>
                            </td>
                            <td>
                                <p class="text-secondary font-weight-bold"><?=number_format($products['gia'])?> VNĐ
                            </td>
                            <td><?=$products['trangthai']==1? '<span class="badge badge-sm bg-gradient-success">Kích hoạt</span>' : '<span class="badge badge-sm bg-gradient-secondary">khóa</span>' ?></td>
                            <td><?=$products['noibat']==1? '<span class="badge badge-sm bg-gradient-success">Kích hoạt</span>' : '<span class="badge badge-sm bg-gradient-secondary">khóa</span>' ?></td>
                            <td><a href="index.php?view=editproduct&masp=<?=$products['masp']?>" class="btn btn-primary btn-sm"><i class="fas fa-pen"></i></a>
                                <a href="index.php?view=delproduct&masp=<?=$products['masp']?>" onclick="return confirm('Bạn có muôn xóa dòng này không?')" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
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