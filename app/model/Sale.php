<?php
require_once '../core/Model.php';

class Sale extends Model {
    private $table = 'hoa_don_ban_thuoc';

    public function addSale($data) {
        if (empty($data['maKH']) || empty($data['maNV']) || !is_numeric($data['tongGia'])) {
            throw new Exception("Invalid input: Customer ID, Employee ID, and Total Price are required.");
        }
        return $this->insert($this->table, $data);
    }

    public function updateSale($maHDB, $data) {
        if (empty($data['maKH']) || empty($data['maNV']) || !is_numeric($data['tongGia'])) {
            throw new Exception("Invalid input: Customer ID, Employee ID, and Total Price are required.");
        }
        $condition = "maHDB = :maHDB";
        $data['maHDB'] = $maHDB;
        $this->update($this->table, $data, $condition);
        return true;
    }

    public function getSale($maHDB) {
        $condition = "maHDB = :maHDB";
        return $this->fetch($this->table, $condition, ['maHDB' => $maHDB]);
    }

    public function deleteSale($maHDB) {
        $condition = "maHDB = :maHDB";
        $this->delete($this->table, $condition, ['maHDB' => $maHDB]);
        return true;
    }

    public function getAllSales() {
        $sql = "SELECT * FROM $this->table";
        return $this->fetchAll($sql);
    }
    public function updateTotalPrice($maHDB) {
        $sql = "SELECT SUM(giaTien * soLuong) AS total FROM chi_tiet_hoa_don WHERE maHDB = :maHDB";
        $result = $this->fetchAll($sql, ['maHDB' => $maHDB]);
        $totalPrice = $result[0]['total'] ?? 0;

        $this->update($this->table, ['tongGia' => $totalPrice], "maHDB = :maHDB", ['maHDB' => $maHDB]);
    }
}
?>
