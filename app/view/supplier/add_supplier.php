<div class="container mt-5">
    <h2 class="text-center">Thêm Nhà Cung Cấp Mới</h2>
    
    <form action="addSupplierSubmit" method="post" class="p-5 bg-white">
    <?php if (isset($data['error'])): ?>
        <div class="alert alert-danger"><?php echo htmlspecialchars($data['error']); ?></div>
    <?php endif; ?>
        <div class="form-group">
            <label for="tenNCC">Tên Nhà Cung Cấp:</label>
            <input type="text" class="form-control" id="tenNCC" name="tenNCC" required>
        </div>
        <div class="form-group">
            <label for="soDienThoai">Số Điện Thoại:</label>
            <input type="text" class="form-control" id="soDienThoai" name="soDienThoai" required>
        </div>
        <div class="form-group">
            <label for="diaChi">Địa Chỉ:</label>
            <input type="text" class="form-control" id="diaChi" name="diaChi" required>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Thêm Nhà Cung Cấp</button>
        </div>
    </form>
</div>