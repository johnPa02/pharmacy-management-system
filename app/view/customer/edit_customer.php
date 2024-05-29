<div class="row">
    <div class="col-lg-12">
    <h2 class="mb-4">Cập Nhật Thông Tin Khách Hàng</h2>
    <?php
    if (isset($data['error'])) {
        echo '<div class="alert alert-danger">' . htmlspecialchars($data['error']) . '</div>';
    }
    ?>
    <form action="http://localhost:8083/updateCustomerSubmit/<?= $customer['maKH'] ?>" method="post" class="bg-light p-4">
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($customer['email']); ?>" required>
        </div>
        <div class="form-group">
            <label for="password">Mật Khẩu Mới:</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter new password">
        </div>
        <div class="form-group">
            <label for="hoTen">Họ và Tên:</label>
            <input type="text" class="form-control" id="hoTen" name="hoTen" value="<?php echo htmlspecialchars($customer['hoTen']); ?>" required>
        </div>
        <div class="form-group">
            <label for="gioiTinh">Giới Tính:</label>
            <select class="form-control" id="gioiTinh" name="gioiTinh">
                <option value="Nam" <?php echo $customer['gioiTinh'] == 'Nam' ? 'selected' : ''; ?>>Nam</option>
                <option value="Nữ" <?php echo $customer['gioiTinh'] == 'Nữ' ? 'selected' : ''; ?>>Nữ</option>
                <option value="Khác" <?php echo $customer['gioiTinh'] == 'Khác' ? 'selected' : ''; ?>>Khác</option>
            </select>
        </div>
        <div class="form-group">
            <label for="ngaySinh">Ngày Sinh:</label>
            <input type="date" class="form-control" id="ngaySinh" name="ngaySinh" value="<?php echo htmlspecialchars($customer['ngaySinh']); ?>" required>
        </div>
        <div class="form-group">
            <label for="diaChi">Địa Chỉ:</label>
            <input type="text" class="form-control" id="diaChi" name="diaChi" value="<?php echo htmlspecialchars($customer['diaChi']); ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Cập Nhật</button>
    </form>
    </div>
</div>