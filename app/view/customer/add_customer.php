<!-- Customer Add Form Content Start -->
<div class="row">
    <div class="col-lg-12">
        <h2 class="text-center">Thêm Khách Hàng Mới</h2>
        
        <form action="addCustomerSubmit" method="post" class="p-5 bg-white">
        <?php if (isset($data['error'])): ?>
            <div class="error-message"><?php echo htmlspecialchars($data['error']); ?></div>
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
                <button type="submit" class="btn btn-primary">Thêm Khách Hàng</button>
            </div>
        </form>
    </div>
</div>
<!-- Customer Add Form Content End -->
