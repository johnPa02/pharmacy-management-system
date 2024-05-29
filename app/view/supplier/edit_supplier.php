<div class="container mt-5">
    <h2 class="text-center">Cập Nhật Nhà Cung Cấp</h2>
    
    <form action="http://localhost:8083/updateSupplierSubmit/<?= $supplier['maNCC'] ?>" method="post" class="p-5 bg-white">
    <?php if (isset($data['error'])): ?>
        <div class="alert alert-danger"><?php echo htmlspecialchars($data['error']); ?></div>
    <?php endif; ?>
        <div class="form-group">
            <label for="tenNCC">Tên Nhà Cung Cấp:</label>
            <input type="text" class="form-control" id="tenNCC" name="tenNCC" value="<?php echo htmlspecialchars($data['supplier']['tenNCC']); ?>" required>
        </div>
        <div class="form-group">
            <label for="soDienThoai">Số Điện Thoại:</label>
            <input type="text" class="form-control" id="soDienThoai" name="soDienThoai" value="<?php echo htmlspecialchars($data['supplier']['soDienThoai']); ?>" required>
        </div>
        <div class="form-group">
            <label for="diaChi">Địa Chỉ:</label>
            <input type="text" class="form-control" id="diaChi" name="diaChi" value="<?php echo htmlspecialchars($data['supplier']['diaChi']); ?>" required>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Cập Nhật</button>
        </div>
    </form>
</div>