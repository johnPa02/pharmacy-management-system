<!-- Customer Management Content Start -->
<div class="row">
    <div class="col-lg-12">
        <h2 class="text-center">Quản lý Khách hàng</h2>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>Mã KH</th>
                        <th>Email</th>
                        <th>Tên</th>
                        <th>Giới tính</th>
                        <th>Địa chỉ</th>
                        <th>Ngày sinh</th>
                        <th>Ngày mua hàng gần nhất</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($customers)): ?>
                        <tr>
                            <td colspan="8" class="text-center">Không tìm thấy khách hàng nào</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($customers as $customer): ?>
                            <tr>
                                <td><?= htmlspecialchars($customer['maKH']) ?></td>
                                <td><?= htmlspecialchars($customer['email']) ?></td>
                                <td><?= htmlspecialchars($customer['hoTen']) ?></td>
                                <td><?= htmlspecialchars($customer['gioiTinh']) ?></td>
                                <td><?= htmlspecialchars($customer['diaChi']) ?></td>
                                <td><?= htmlspecialchars($customer['ngaySinh']) ?></td>
                                <td><?= htmlspecialchars($customer['ngayMuaHang']) ?></td>
                                <td>
                                    <a href='updateCustomer/<?= $customer['maKH'] ?>' class='btn btn-primary btn-sm'>Sửa</a>
                                    <a href='deleteCustomer/<?= $customer['maKH'] ?>' class='btn btn-danger btn-sm'>Xóa</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>

            </table>
        </div>
        <div class="text-center">
            <a href="addCustomer" class="btn btn-success">Tạo khách hàng mới</a>
        </div>
    </div>
</div>
<!-- Customer Management Content End -->
