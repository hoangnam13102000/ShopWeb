<?php
 include 'libs/quanly.php';
 include 'libs/oppProduct.php';
if (isset($_POST['masp'], $_POST['tensp'])) {
    $image = '';
        if (isset($_FILES['image']['error']) && $_FILES['image']['error'] == 0) {
            $image = myupload($_FILES['image'], 'public/upload', $er, 4);
        }
   $product=new quanlyproduct($image, $_POST['masp'],$_POST['style'], $_POST['tensp'],$_POST['hang'], $_POST['gia'],$_POST['trangthai'], $_POST['noibat']);
   $product->add();
}
?>
<div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
    <h6 class="text-white text-capitalize ps-3">Thêm sản phẩm</h6>
</div>
<div class="card-body">
<form action="" method="post" enctype="multipart/form-data">
            <div class="input-group input-group-outline mt-2">
                <label class="form-label">Hình</label>
                <input type="file" class="form-control" name="image" id="" aria-describedby="helpId" placeholder="">
            </div>
            <div class="input-group input-group-outline mt-2">
                <label class="form-label">Mã sản phẩm</label>
                <input type="text" class="form-control" name="masp" id="" aria-describedby="helpId" placeholder="">
            </div>
            <div class="input-group input-group-outline mt-2">
                <label class="form-label">Loại sản phẩm</label>
                <select class="form-control" name="style" id="">
                    <option value="Điện thoại">Điện thoại</option>
                    <option value="Phụ kiện">Phụ kiện</option>
                    <option value="Card điện thoại">Card điện thoại</option>
                </select>
            </div>    
            <div class="input-group input-group-outline mt-2">
                <label class="form-label">Tên sản phẩm</label>
                <input type="text" class="form-control" name="tensp" id="" placeholder="">
            </div>
            <div class="input-group input-group-outline mt-2">
                <label class="form-label">Hãng</label>
                <input type="text" class="form-control" name="hang" id="" aria-describedby="helpId" placeholder="">
            </div>
            <div class="input-group input-group-outline mt-2">
                <label class="form-label">Giá</label>
                <input type="text" class="form-control" name="gia" id="" aria-describedby="helpId" placeholder="">
            </div>
            <div class="input-group input-group-outline mt-2">
                <label class="form-label">Trạng thái</label>
                <select class="form-control" name="trangthai" id=""value="">
                    <option value="1">Kích hoạt</option>
                    <option value="0">Khóa</option>
                </select>
            </div>
            <div class="input-group input-group-outline mt-2">
                <label class="form-label">Nổi bật</label>
                <select class="form-control" name="noibat" id=""value="">
                    <option value="1">Kích hoạt</option>
                    <option value="0">Khóa</option>
                </select>
            </div>
            <div class="text-right mt-2">
                <button type="submit" class="btn btn-primary">Thêm</button>
                <a href="index.php?view=productlist" class="btn btn-primary"><i class="material-icons opacity-10">reply</i> Quay về</a>
            </div>
        </form>
</div>