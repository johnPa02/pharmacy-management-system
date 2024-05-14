<div class="container mt-5">
    <h2 class="text-center">Thêm Nhân Viên Mới</h2>
    
    <form action="addEmployeeSubmit" method="post" class="p-5 bg-white">
    <?php if (isset($data['error'])): ?>
        <div class="alert alert-danger"><?php echo htmlspecialchars($data['error']); ?></div>
    <?php endif; ?>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Mật khẩu:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="hoTen">Họ và Tên:</label>
            <input type="text" class="form-control" id="hoTen" name="hoTen" required>
        </div>
        <div class="form-group">
            <label for="gioiTinh">Giới Tính:</label>
            <select class="form-control" id="gioiTinh" name="gioiTinh">
                <option value="Nam">Nam</option>
                <option value="Nữ">Nữ</option>
                <option value="Khác">Khác</option>
            </select>
        </div>
        <div class="form-group">
            <label for="ngaySinh">Ngày Sinh:</label>
            <input type="date" class="form-control" id="ngaySinh" name="ngaySinh" required>
        </div>
        <div class="form-group">
            <label for="diaChi">Địa Chỉ:</label>
            <input type="text" class="form-control" id="diaChi" name="diaChi" required>
        </div>
        <div class="form-group">
            <label for="luong">Lương:</label>
            <input type="number" class="form-control" id="luong" name="luong" required step="0.01">
        </div>

        <div class="form-group">
            <label for="role">Vai Trò:</label>
            <select class="form-control" id="role" name="role">
                <option value="Dược sĩ">Dược sĩ</option>
                <option value="Admin">Admin</option>
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Thêm Nhân Viên</button>
        </div>
    </form>
</div>