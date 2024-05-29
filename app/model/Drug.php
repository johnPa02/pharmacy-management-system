<?php
require_once './core/Model.php';

class Drug extends Model {
    private $table = 'thuoc';

    public function addDrug($data) {
        if (empty($data['tenThuoc']) || !is_numeric($data['giaBan']) || !is_numeric($data['giaNhap'])) {
            throw new Exception("Invalid input: Name, selling price, and cost price are required.");
        }
        return $this->insert($this->table, $data);
    }

    public function updateDrug($maThuoc, $data) {
        if (!is_numeric($data['giaBan']) || !is_numeric($data['giaNhap'])) {
            throw new Exception("Invalid input: Name, selling price, and cost price are required.");
        }
        $condition = "maThuoc = :maThuoc";
        $data['maThuoc'] = $maThuoc;
        $this->update($this->table, $data, $condition);
        return true;
    }

    public function getDrug($maThuoc) {
        $condition = "maThuoc = :maThuoc";
        return $this->fetch($this->table, $condition, ['maThuoc' => $maThuoc]);
    }

    public function deleteDrug($maThuoc) {
        $condition = "maThuoc = :maThuoc";
        $this->delete($this->table, $condition, ['maThuoc' => $maThuoc]);
        return true;
    }

    public function getAllDrugs() {
        $sql = "SELECT * FROM $this->table";
        return $this->fetchAll($sql);
    }

    // Search drugs by name or type
    public function searchDrugs($searchTerm) {
        $sql = "SELECT * FROM $this->table WHERE tenThuoc LIKE :searchTerm OR loai LIKE :searchTerm";
        $params = ['searchTerm' => '%' . $searchTerm . '%'];
        return $this->fetchAll($sql, $params);
    }
}
?>
