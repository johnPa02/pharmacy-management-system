<div class="container mt-5">
    <h2 class="text-center">Cập Nhật Nhân Viên</h2>
    
    <form action="http://localhost:8083/updateEmployeeSubmit/<?= $employee['maNV'] ?>" method="post" class="p-5 bg-white">
    <?php if (isset($data['error'])): ?>
        <div class="alert alert-danger"><?php echo htmlspecialchars($data['error']); ?></div>
    <?php endif; ?>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($employee['email']); ?>" required>
        </div>
        <div class="form-group">
            <label for="password">Mật khẩu:</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter new password" required>
        </div>
        <div class="form-group">
            <label for="hoTen">Họ và Tên:</label>
            <input type="text" class="form-control" id="hoTen" name="hoTen" value="<?php echo htmlspecialchars($employee['hoTen']); ?>" required>
        </div>
        <div class="form-group">
            <label for="gioiTinh">Giới Tính:</label>
            <select class="form-control" id="gioiTinh" name="gioiTinh">
                <option value="Nam" <?php echo ($employee['gioiTinh'] == 'Nam') ? 'selected' : ''; ?>>Nam</option>
                <option value="Nữ" <?php echo ($employee['gioiTinh'] == 'Nữ') ? 'selected' : ''; ?>>Nữ</option>
                <option value="Khác" <?php echo ($employee['gioiTinh'] == 'Khác') ? 'selected' : ''; ?>>Khác</option>
            </select>
        </div>

        <div class="form-group">
            <label for="ngaySinh">Ngày Sinh:</label>
            <input type="date" class="form-control" id="ngaySinh" name="ngaySinh" value="<?php echo htmlspecialchars($employee['ngaySinh']); ?>" required>
        </div>
        <div class="form-group">
            <label for="diaChi">Địa Chỉ:</label>
            <input type="text" class="form-control" id="diaChi" name="diaChi" value="<?php echo htmlspecialchars($employee['diaChi']); ?>" required>
        </div>
        <div class="form-group">
            <label for="luong">Lương:</label>
            <input type="number" class="form-control" id="luong" name="luong" value="<?php echo htmlspecialchars($employee['luong']); ?>" required step="0.01">
        </div>

        <div class="form-group">
            <label for="role">Vai Trò:</label>
            <select class="form-control" id="role" name="role">
                <option <?php echo ($employee['vaiTro'] == 'Dược sĩ') ? 'selected' : ''; ?> value="Dược sĩ">Dược sĩ</option>
                <option <?php echo ($employee['vaiTro'] == 'admin') ? 'selected' : ''; ?> value="Admin">Admin</option>
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Cập Nhật Nhân Viên</button>
        </div>
    </form>
</div>