<div class="container">
        <form action="/pharmacy-management-system/public/index.php/updateDrugSubmit/<?= $drug['maThuoc'] ?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-5 mr-auto">
                    <div class="border-custom text-center">
                        <!-- Display current image -->
                        <img src="<?php echo $drug['image']; ?>" alt="Drug Image" class="img-fluid p-5">
                        <!-- Input for new image upload -->
                        <h4 class="text-black">Đổi hình ảnh mới</h2>
                        <input type="file" class="form-control-file" name="newImage">
                    </div>
                </div>
                <div class="col-md-6">
                    <h2 class="text-black"><?php echo $drug['tenThuoc']; ?>, <?php echo $drug['loai']; ?></h2>

                    <div class="form-group mb-3">
                        <label for="giaBan">Giá bán:</label>
                        <input type="number" class="form-control" id="giaBan" name="giaBan" value="<?php echo $drug['giaBan']; ?>">
                    </div>

                    <div class="form-group mb-3">
                        <label for="giaNhap">Giá nhập:</label>
                        <input type="number" class="form-control" id="giaNhap" name="giaNhap" value="<?php echo $drug['giaNhap']; ?>">
                    </div>

                    <div class="form-group mb-3">
                        <label for="hanSuDung">Hạn sử dụng:</label>
                        <input type="date" class="form-control" id="hanSuDung" name="hanSuDung" value="<?php echo $drug['hanSuDung']; ?>">
                    </div>

                    <div class="form-group mb-5">
                        <label for="maNCC">Nhà cung cấp:</label>
                        <select class="form-control" id="maNCC" name="maNCC">
                            <?php
                                foreach ($suppliers as $supplier) {
                                    $selected = ($supplier['maNCC'] == $drug['maNCC']) ? 'selected' : '';
                                    echo "<option value='{$supplier['maNCC']}' {$selected}>{$supplier['maNCC']}</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Cập nhật thông tin</button>
                    <a href='/pharmacy-management-system/public/index.php/deleteDrug/<?= $drug['maThuoc'] ?>' class='btn btn-danger btn-sm'>Xóa thuốc</a>
                    
                </div>
            </div>
        </form>
    </div>