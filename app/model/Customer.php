<?php
require_once './core/Model.php';

class Customer extends Model {
    private $table = 'khach_hang';

    public function addCustomer($customerData, $accountData) {
        $this->insert('tai_khoan', $accountData);
        $accountId = $this->db->lastInsertId();
    
        if (!$accountId) {
            throw new Exception("Failed to create account.");
        }
    
        if (empty($customerData['hoTen']) || !isset($customerData['ngaySinh']) || empty($customerData['diaChi'])) {
            throw new Exception("Required customer information is missing.");
        }
        $customerData['maKH'] = $accountId;
        $this->insert($this->table, $customerData);
    
        return true;
    }
    

    public function updateCustomer($maKH, $customerData, $accountData) {
        $this->update('tai_khoan', $accountData, "ID = {$maKH}");
    
        $condition = "maKH = :maKH";
        $customerData['maKH'] = $maKH;
        $this->update($this->table, $customerData, $condition);
    
        return true;
    }
    

    public function getCustomer($maKH) {
        $condition = "maKH = :maKH";
        return $this->fetch($this->table, $condition, ['maKH' => $maKH]);
    }

    public function deleteCustomer($maKH) {
        $deletedCustomer = $this->delete($this->table, "maKH = :maKH", ['maKH' => $maKH]);
        $deletedAccount = $this->delete('tai_khoan', "ID = :maKH", ['maKH' => $maKH]);
        return true;
    }
    
    public function getAllCustomers() {
        $sql = "SELECT kh.maKH, kh.hoTen, kh.gioiTinh, kh.ngaySinh, kh.diaChi, kh.ngayMuaHang, tk.email 
                FROM $this->table as kh
                JOIN tai_khoan as tk ON kh.maKH = tk.ID";
        return $this->fetchAll($sql);
    }
    
    public function updateLastPurchaseDate($maKH, $purchaseDate) {
        $data = ['ngayMuaHang' => $purchaseDate];
        return $this->update('khach_hang', $data, "maKH = :maKH", ['maKH' => $maKH]);
    }
}
?>
