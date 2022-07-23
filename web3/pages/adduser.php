<?php
if (isset($_POST['username'], $_POST['password'])) {
    include 'core/list.php';
    if (!isset($list[$_POST['username']])) {
        //upload hinh
        $image = '';
        if (isset($_FILES['image']['error']) && $_FILES['image']['error'] == 0) {
            $image = myupload($_FILES['image'], 'public/upload', $er, 4);
        }
        $list[$_POST['username']] = [
            'image' => $image,
            'username' => $_POST['username'],
            'password' => $_POST['password'],
            'name' => $_POST['name'],
            'address' => $_POST['address'],
            'email' => $_POST['email'],
            'status' => $_POST['status']=1,
            'role' => $_POST['role']='Customer'
        ];
        ghifile($path,$list);
        $_SESSION['dangky']='Bạn đã đăng ký tài khoản thành công';
        chuyentrang('index.php?view=userlist');
    } else {
        $mg = msg('Tên đăng nhập đã được sử dụng.');
    }
} else {
    $mg = msg('Dữ liệu không hợp lệ.');
}
?>
<div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
    <h6 class="text-white text-capitalize ps-3">Thêm tài khoản User</h6>
</div>
<div class="card-body">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="input-group input-group-outline mt-2">
            <label class="form-label">Hình</label>
            <input type="file" class="form-control " name="image" id="" aria-describedby="helpId" placeholder="">
        </div>
        <div class="input-group input-group-outline mt-2">
            <label class="form-label">Tên đăng nhập</label>
            <input type="text" class="form-control" name="username" id="" aria-describedby="helpId" placeholder="">
        </div>
        <div class="input-group input-group-outline mt-2">
            <label class="form-label">Mật khẩu</label>
            <input type="password" class="form-control" name="password" id="" placeholder="">
        </div>
        <div class="input-group input-group-outline mt-2">
            <label class="form-label">Họ và tên</label>
            <input type="text" class="form-control" name="name" id="" aria-describedby="helpId" placeholder="">
        </div>
        <div class="input-group input-group-outline mt-2">
            <label class="form-label">Địa chỉ</label>
            <input type="text" class="form-control" name="address" id="" aria-describedby="helpId" placeholder="">
        </div>
        <div class="input-group input-group-outline mt-2">
            <label class="form-label">Email</label>
            <input type="text" class="form-control" name="email" id="" aria-describedby="helpId" placeholder="">
        </div>
        <div class="text-right mt-2">
            <button type="submit" class="btn btn-primary"><i class="material-icons opacity-10">person_add</i> Thêm</button>
            <a href="index.php?view=userlist" class="btn btn-primary"><i class="material-icons opacity-10">reply</i> Quay về</a>
        </div>
    </form>
</div>
<?php include('widgets/footer.php'); ?>