<!-- employees Management Content Start -->
<div class="row">
    <div class="col-lg-12">
        <h2 class="text-center">Quản lý Nhân viên</h2>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>Mã NV</th>
                        <th>Email</th>
                        <th>Tên</th>
                        <th>Giới tính</th>
                        <th>Địa chỉ</th>
                        <th>Ngày sinh</th>
                        <th>Lương</th>
                        <th>Vai trò</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($employees)): ?>
                        <tr>
                            <td colspan="8" class="text-center">Không tìm thấy khách hàng nào</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($employees as $employees): ?>
                            <tr>
                                <td><?= htmlspecialchars($employees['maNV']) ?></td>
                                <td><?= htmlspecialchars($employees['email']) ?></td>
                                <td><?= htmlspecialchars($employees['hoTen']) ?></td>
                                <td><?= htmlspecialchars($employees['gioiTinh']) ?></td>
                                <td><?= htmlspecialchars($employees['diaChi']) ?></td>
                                <td><?= htmlspecialchars($employees['ngaySinh']) ?></td>
                                <td><?= htmlspecialchars($employees['luong']) ?></td>
                                <td><?= htmlspecialchars($employees['vaiTro']) ?></td>
                                <td>
                                    <a href='updateEmployee/<?= $employees['maNV'] ?>' class='btn btn-primary btn-sm'>Sửa</a>
                                    <a href='deleteEmployee/<?= $employees['maNV'] ?>' class='btn btn-danger btn-sm'>Xóa</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>

            </table>
        </div>
        <div class="text-center">
            <a href="addEmployee" class="btn btn-success">Tạo nhân viên mới</a>
        </div>
    </div>
</div>
<!-- employees Management Content End -->
