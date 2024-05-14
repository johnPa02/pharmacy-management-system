<div class="container mt-5">
    <h2 class="mb-4 text-center">Danh sách Nhà Cung Cấp</h2>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>Mã NCC</th>
                    <th>Tên Nhà Cung Cấp</th>
                    <th>Số Điện Thoại</th>
                    <th>Địa Chỉ</th>
                    <th>Thao Tác</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($suppliers)): ?>
                    <tr>
                        <td colspan="5" class="text-center">Không có nhà cung cấp nào</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($suppliers as $supplier): ?>
                        <tr>
                            <td><?= htmlspecialchars($supplier['maNCC']) ?></td>
                            <td><?= htmlspecialchars($supplier['tenNCC']) ?></td>
                            <td><?= htmlspecialchars($supplier['soDienThoai']) ?></td>
                            <td><?= htmlspecialchars($supplier['diaChi']) ?></td>
                            <td>
                                <a href='updateSupplier/<?= $supplier['maNCC'] ?>' class='btn btn-primary btn-sm'>Sửa</a>
                                <a href='deleteSupplier/<?= $supplier['maNCC'] ?>' class='btn btn-danger btn-sm'>Xóa</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <div class="text-center">
        <a href="addSupplier" class="btn btn-success">Thêm Nhà Cung Cấp Mới</a>
    </div>
</div>