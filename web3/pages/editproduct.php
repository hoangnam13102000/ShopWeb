<?php
include 'core/listProduct.php';
include 'libs/quanly.php';
 include 'libs/oppProduct.php';
 $image = '';
        if (isset($_FILES['image']['error']) && $_FILES['image']['error'] == 0) {
            $image = myupload($_FILES['image'], 'public/upload', $er, 4);
        }
   $product=new quanlyproduct($image, $_GET['masp'],$_POST['style'], $_POST['tensp'],$_POST['hang'], $_POST['gia'],$_POST['trangthai'], $_POST['noibat']);
   $product->edit();
?>
<div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
    <h6 class="text-white text-capitalize ps-3">Edit sản phẩm</h6>
</div>
<div class="card-body">
<form action="" method="post" enctype="multipart/form-data">
            <div class="input-group input-group-outline mt-2">
                <label class="form-label">Hình</label>
                <input type="file" class="form-control" name="image" id="" aria-describedby="helpId" placeholder="">
                <img src="<?=showimg($products['image'])?>" width="100"/>
            </div>
            <div class="input-group input-group-outline mt-2">
                <label class="form-label">Mã sản phẩm</label>
                <input type="text" class="form-control" name="masp" id="" aria-describedby="helpId" placeholder="" value="<?= $products['masp'] ?>">
            </div>
            <div class="input-group input-group-outline mt-2">
                <label class="form-label">Loại sản phẩm</label>
                <select class="form-control" name="style" id="" value="<?= $products['style'] ?>">
                    <option <?=$products['style']=='Điện thoại'?'selected':''?>>Điện thoại</option>
                    <option <?=$products['style']=='Phụ kiện'?'selected':''?>>Phụ kiện</option>
                    <option <?=$products['style']=='Card điện thoại'?'selected':''?>>Card điện thoại</option>
                </select>
            </div>    
            <div class="input-group input-group-outline mt-2">
                <label class="form-label">Tên sản phẩm</label>
                <input type="text" class="form-control" name="tensp" id="" placeholder="" value="<?= $products['tensp'] ?>">
            </div>
            <div class="input-group input-group-outline mt-2">
                <label class="form-label">Hãng</label>
                <input type="text" class="form-control" name="hang" id="" aria-describedby="helpId" placeholder="" value="<?= $products['hang'] ?>">
            </div>
            <div class="input-group input-group-outline mt-2">
                <label class="form-label">Giá</label>
                <input type="text" class="form-control" name="gia" id="" aria-describedby="helpId" placeholder="" value="<?= $products['gia'] ?>"> 
            </div>
            <div class="input-group input-group-outline mt-2">
                <label class="form-label">Trạng thái</label>
                <select class="form-control" name="trangthai" id=""value="<?= $products['trangthai'] ?>">
                    <option <?=$products['trangthai']==1?'selected':''?>value="1">Kích hoạt</option>
                    <option <?=$products['trangthai']==0?'selected':''?>value="0">Khóa</option>
                </select>
            </div>
            <div class="input-group input-group-outline mt-2">
                <label class="form-label">Nổi bật</label>
                <select class="form-control" name="noibat" id=""value="<?= $products['noibat'] ?>">
                    <option <?=$products['noibat']==1?'selected':''?>value="1">Kích hoạt</option>
                    <option <?=$products['noibat']==0?'selected':''?>value="0">Khóa</option>
                </select>
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-primary">Thêm</button>
                <a href="index.php?view=productlist" class="btn btn-primary"><i class="material-icons opacity-10">reply</i> Quay về</a>
            </div>
        </form>
</div>
<?php include('widgets/footer.php'); ?>