<div class="container">
    <h2 class="text-center">Danh sách Thuốc</h2>
    <div class="row">
        <div class="col-12 text-right mb-3">
            <a href="addDrug" class="btn btn-success">Thêm Thuốc Mới</a>
        </div>
        <div class="col-12">
            <!-- Search form -->
            <form action="http://localhost:8083/searchDrugs" method="post" class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Tìm kiếm thuốc" aria-label="Search" name="searchTerm">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
            </form>
        </div>
    </div>
    <div class="row">
    <?php if (!empty($drugs)): ?>
        <?php foreach ($drugs as $drug): ?>
        <div class="col-sm-6 col-lg-4 text-center drug-item item mb-4">
            <a href="updateDrug/<?= $drug['maThuoc'] ?>"><img src="<?= $drug['image'] ?>" alt="<?= htmlspecialchars($drug['tenThuoc']) ?>" class="img-fluid"></a>
            <h3 class="text-dark"><a href="viewDrug/<?= $drug['maThuoc'] ?>"><?= htmlspecialchars($drug['tenThuoc']) ?></a></h3>
            <p class="price"><?= htmlspecialchars($drug['giaBan']) ?>₫</p>
        </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="col-12">
            <p class="text-center">Không tìm thấy thuốc phù hợp.</p>
        </div>
    <?php endif; ?>
</div>

</div>
