<div class="container">
    <h2>Hóa Đơn</h2>
    <div>
        <p><strong>Mã hóa đơn:</strong> <?php echo htmlspecialchars($sale['maHDB']); ?></p>
        <p><strong>Ngày lập:</strong> <?php echo htmlspecialchars($sale['ngayLap']); ?></p>
        <p><strong>Tổng tiền:</strong> <?php echo htmlspecialchars($sale['tongGia']); ?></p>
        <p><strong>Mã Nhân Viên:</strong> <?php echo htmlspecialchars($sale['maNV']); ?> - <?php echo htmlspecialchars($sale['tenNV']); ?></p>
        <p><strong>Mã Khách:</strong> <?php echo htmlspecialchars($sale['maKH']); ?> - <?php echo htmlspecialchars($sale['tenKH']); ?></p>
    </div>
    <h3>Chi tiết hóa đơn</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên thuốc</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Thành tiền</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($saleDetails as $item): ?>
            <tr onclick="window.location='drugDetails.php?maThuoc=<?php echo $item['maThuoc']; ?>'">
                <td><?php echo htmlspecialchars($item['maThuoc']); ?></td>
                <td><?php echo htmlspecialchars($item['tenThuoc']); ?></td>
                <td><?php echo htmlspecialchars($item['soLuong']); ?></td>
                <td><?php echo htmlspecialchars($item['giaTien']); ?></td>
                <td><?php echo htmlspecialchars($item['giaTien'] * $item['soLuong']); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>