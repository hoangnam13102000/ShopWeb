<?php
if (!islogin('trangthai1')) {
    chuyentrang('login.php');
}
include 'core/list.php';
?>
<div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
    <h6 class="text-white text-capitalize ps-3">Danh sách tài khoản User</h6>
</div>
<div class="text-right">
    <a name="" id="" class="btn btn-dark mt-2" href="index.php?view=adduser" role="button"><i class="material-icons opacity-10">person_add</i> Thêm tài khoản</a>
</div>
<div class="container-fluid py-4">
    <div class="card-body px-0 pb-2">
        <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-secondary">Hình</th>
                        <th class="text-secondary">Tên đăng nhập</th>
                        <th class="text-secondary">Mật khẩu</th>
                        <th class="text-secondary">Họ và tên</th>
                        <th class="text-secondary">Địa chỉ</th>
                        <th class="text-secondary">Email</th>
                        <th class="text-secondary">Trạng thái</th>
                        <th class="text-secondary">Quyền</th>
                        <th class="text-secondary">Tác vụ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($list as $user) {
                    ?>
                        <tr>
                            <td>
                                <div>
                                    <img width="100" src="<?= showimg($user['image']) ?>" class="img-fluid rounded-circle" alt="" >
                                </div>
                            </td>
                            <td>
                                <p class="text-secondary font-weight-bold"><?= $user['username'] ?></p>
                            </td>
                            <td>
                                <p class="text-secondary font-weight-bold"><?= $user['password'] ?>
                            </td>
                            <td>
                                <p class="text-secondary font-weight-bold"><?= $user['name'] ?>
                            </td>
                            <td>
                                <p class="text-secondary font-weight-bold"><?= $user['address'] ?>
                            </td>
                            <td>
                                <p class="text-secondary font-weight-bold"><?= $user['email'] ?>
                            </td>
                            <td><?= $user['status'] == 1 ? '<span class="badge badge-sm bg-gradient-success">Kích hoạt</span>' : '<span class="badge badge-sm bg-gradient-secondary">khóa</span>' ?></td>
                            <td><span class="badge badge-sm bg-gradient-primary"><?= $user['role'] ?></span></td>
                            <td><a href="index.php?view=edituser&username=<?= $user['username'] ?>" class="btn btn-primary btn-sm"><i class="fas fa-pen"></i></a>
                                <a href="index.php?view=deluser&username=<?= $user['username'] ?>" onclick="return confirm('Bạn có muôn xóa dòng này không?')" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
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