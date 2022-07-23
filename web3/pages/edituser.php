<?php
include 'core/list.php';
$user = $list[$_GET['username']] ?? null;
if (!$user) {
    chuyentrang('index.php?view=userlist');
}
if(isset($_POST['username'])){
    if($_POST['username'])
    {
        $image = $user['image'];
    if (isset($_FILES['image']['error']) && $_FILES['image']['error'] == 0) {
        $image = myupload($_FILES['image'], 'images', $er, 4);
    }
    $list[$user['username']]['image'] = $image;
    $list[$user['username']]['password'] = $_POST['password']?$_POST['password']:$user['password'];
    $list[$user['username']]['name'] = $_POST['name'];
    $list[$user['username']]['address'] = $_POST['address'];
    $list[$user['username']]['email'] = $_POST['email'];
    $list[$user['username']]['status'] = $_POST['status'];
    $list[$user['username']]['role'] = $_POST['role'];
    ghifile($path, $list);
    $user = $list[$user['username']];
    chuyentrang('index.php?view=userlist');
    }
    else
    {
        $mg = msg('Dữ liệu không hợp lệ.');
    }
}
?>
<div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
    <h6 class="text-white text-capitalize ps-3">Edit tài khoản User</h6>
</div>
<div class="card-body">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="input-group input-group-outline mt-2">
            <label class="form-label">Hình</label>
            <input type="file" class="form-control " name="image" id="" aria-describedby="helpId" placeholder="">
            <img src="<?=showimg($user['image'])?>" width="100"/>
        </div>
        <div class="input-group input-group-outline mt-2">
            <label class="form-label">Tên đăng nhập</label>
            <input type="text" class="form-control" name="username" id="" aria-describedby="helpId" placeholder="" value="<?= $user['username'] ?>" readonly>
        </div>
        <div class="input-group input-group-outline mt-2">
            <label class="form-label">Mật khẩu</label>
            <input type="password" class="form-control" name="password" id="" placeholder="" value="<?= $user['password'] ?>">
        </div>
        <div class="input-group input-group-outline mt-2">
            <label class="form-label">Họ và tên</label>
            <input type="text" class="form-control" name="name" id="" aria-describedby="helpId" placeholder="" value="<?= $user['name'] ?>">
        </div>
        <div class="input-group input-group-outline mt-2">
            <label class="form-label">Địa chỉ</label>
            <input type="text" class="form-control" name="address" id="" aria-describedby="helpId" placeholder="" value="<?= $user['address'] ?>">
        </div>
        <div class="input-group input-group-outline mt-2">
            <label class="form-label">Email</label>
            <input type="text" class="form-control" name="email" id="" aria-describedby="helpId" placeholder="" value="<?= $user['email'] ?>">
        </div>
        <div class="input-group input-group-outline mt-2">
                <label for="" class="form-label">Trạng thái</label>
                <select class="form-control" name="status" id=""value="<?= $user['status'] ?>">
                    <option <?=$user['status']==1?'selected':''?>value="1">Kích hoạt</option>
                    <option <?=$user['status']==0?'selected':''?>value="0">Khóa</option>
                </select>
        </div>
        <div class="input-group input-group-outline mt-2">
                <label for="" class="form-label">Quyền</label>
                <select class="form-control" name="role" id="" value="<?= $user['role'] ?>">
                <option <?=$user['role']=='Admin'?'selected':''?>value="Admin">Admin</option>
                    <option <?=$user['role']=='Customer'?'selected':''?>value="Customer" >Customer</option>
                </select>
        </div>
        <div class="text-right mt-2">
            <button type="submit" class="btn btn-primary"><i class="fas fa-pen"></i> Edit</button>
            <a href="index.php?view=userlist" class="btn btn-primary"><i class="material-icons opacity-10">reply</i> Quay về</a>
        </div>
    </form>
</div>
<?php include('widgets/footer.php'); ?>