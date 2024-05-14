<div class="container mt-5">
    <h2 class="text-center">Thêm Thuốc Mới</h2>

    <form action="addDrugSubmit" method="post" enctype="multipart/form-data" class="p-5 bg-white">
    <?php if (isset($data['error'])): ?>
        <div class="alert alert-danger"><?php echo htmlspecialchars($data['error']); ?></div>
    <?php endif; ?>
        <div class="form-group">
            <label for="tenThuoc">Tên Thuốc:</label>
            <input type="text" class="form-control" id="tenThuoc" name="tenThuoc" required>
        </div>
        <div class="form-group">
            <label for="loai">Loại Thuốc:</label>
            <input type="text" class="form-control" id="loai" name="loai" required>
        </div>
        <div class="form-group">
            <label for="giaBan">Giá Bán:</label>
            <input type="number" class="form-control" id="giaBan" name="giaBan" required step="0.01">
        </div>
        <div class="form-group">
            <label for="giaNhap">Giá Nhập:</label>
            <input type="number" class="form-control" id="giaNhap" name="giaNhap" required step="0.01">
        </div>
        <div class="form-group">
            <label for="hanSuDung">Hạn Sử Dụng:</label>
            <input type="date" class="form-control" id="hanSuDung" name="hanSuDung" required>
        </div>
        <div class="form-group">
            <label for="maNCC">Nhà Cung Cấp:</label>
            <select class="form-control" id="maNCC" name="maNCC">
                <?php foreach ($suppliers as $supplier): ?>
                    <option value="<?php echo $supplier['maNCC']; ?>"><?php echo htmlspecialchars($supplier['tenNCC']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="image">Hình Ảnh:</label>
            <input type="file" class="form-control" id="image" name="image" required>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Thêm Thuốc</button>
        </div>
    </form>
</div>
