<?php
require_once '../core/Model.php';

class Supplier extends Model {
    private $table = 'nha_cung_cap';

    public function addSupplier($data) {
        if (empty($data['tenNCC']) || empty($data['soDienThoai']) || empty($data['diaChi'])) {
            throw new Exception("Invalid input: Supplier name, phone number, and address are required.");
        }
        return $this->insert($this->table, $data);
    }

    public function updateSupplier($maNCC, $data) {
        if (empty($data['tenNCC']) || empty($data['soDienThoai']) || empty($data['diaChi'])) {
            throw new Exception("Invalid input: Supplier name, phone number, and address are required.");
        }
        $condition = "maNCC = :maNCC";
        $data['maNCC'] = $maNCC;
        $this->update($this->table, $data, $condition);
        return true;
    }

    public function getSupplier($maNCC) {
        $condition = "maNCC = :maNCC";
        return $this->fetch($this->table, $condition, ['maNCC' => $maNCC]);
    }

    public function deleteSupplier($maNCC) {
        $condition = "maNCC = :maNCC";
        $this->delete($this->table, $condition, ['maNCC' => $maNCC]);
        return true;
    }

    public function getAllSuppliers() {
        $sql = "SELECT * FROM $this->table";
        return $this->fetchAll($sql);
    }
}
?>
