<?php
require_once './core/Model.php';

class SaleDetail extends Model {
    private $table = 'chi_tiet_hoa_don';

    public function addSaleDetail($data) {
        if (empty($data['maHDB']) || empty($data['maThuoc']) || !is_numeric($data['soLuong']) || !is_numeric($data['giaTien'])) {
            throw new Exception("Invalid input: Sale ID, Drug ID, Quantity, and Price are required.");
        }
        return $this->insert($this->table, $data);
    }

    public function updateSaleDetail($id, $data) {
        if (empty($data['maHDB']) || empty($data['maThuoc']) || !is_numeric($data['soLuong']) || !is_numeric($data['giaTien'])) {
            throw new Exception("Invalid input: Sale ID, Drug ID, Quantity, and Price are required.");
        }
        $condition = "id = :id";
        $data['id'] = $id;
        $this->update($this->table, $data, $condition);
        return true;
    }

    public function getSaleDetail($id) {
        $condition = "id = :id";
        return $this->fetch($this->table, $condition, ['id' => $id]);
    }

    public function deleteSaleDetail($id) {
        $condition = "id = :id";
        $this->delete($this->table, $condition, ['id' => $id]);
        return true;
    }

    public function getAllSaleDetails($maHDB) {
        $sql = "SELECT * FROM $this->table WHERE maHDB = :maHDB";
        return $this->fetchAll($sql, ['maHDB' => $maHDB]);
    }
}
?>
