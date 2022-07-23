<?php
include 'core/listProduct.php';

?>
<div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
    <h6 class="text-white text-capitalize ps-3">Sản phẩm mới</h6>
</div>
<div class="row ">
<?php
if (isset($_SESSION['mgs1'])) {
    echo msg($_SESSION['mgs1']);
    unset($_SESSION['mgs1']);
}
?>
      <?php
      foreach ($list as $products) {
        if ($products['trangthai'] == 1) {
      ?>
          <div class="col-3 mt-4">
            <div class="card-deck">
              <div class="card">
              <img class="card-img-top" src="<?= showimg($products['image']) ?>" class="img-fluid " alt="" >
                <div class="card-body">
                  <h4 class="card-title"><?= $products['tensp'] ?></h4>
                  <p class="card-text text-danger font-weight-bold">Giá: <?= number_format($products['gia']) ?> VNĐ</p>
                  <form action="index.php?view=cart" method="post">
                    <div class="text-right">
                    <input type="number" value="1" name="soluong" min="1" max="10">
                    <input type="hidden" name="tensp" value="<?= $products['tensp'] ?>">
                    <input type="hidden" name="gia" value="<?= $products['gia'] ?>">
                    <input type="hidden" name="image" value="<?= $products['image'] ?>">
                    <input type="submit" class="btn btn-primary" name="addcart" value="Đặt hàng">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
      <?php
        }
      }
      ?>
    </div>
<?php include('widgets/footer.php'); ?>