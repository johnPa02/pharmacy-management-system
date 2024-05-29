<?php
require_once './core/Model.php';  

class Employee extends Model {

    private $table = 'nhan_vien';

    public function addEmployee($employeeData, $accountData) {
        $this->insert('tai_khoan', $accountData);
        $accountId = $this->db->lastInsertId();
    
        if (!$accountId) {
            throw new Exception("Failed to create account.");
        }
    
        if (!$this->validateDate($employeeData['ngaySinh']) || empty($employeeData['diaChi']) || !is_numeric($employeeData['luong'])) {
            throw new Exception("Invalid input parameters for employee.");
        }
        $employeeData['maNV'] = $accountId;
        $this->insert($this->table, $employeeData);
    
        return true;
    }
    

    public function updateEmployee($employeeData, $accountData, $maNhanVien) {
        $this->update('tai_khoan', $accountData, "ID = {$maNhanVien}");
    
        if (!$this->validateDate($employeeData['ngaySinh']) || empty($employeeData['diaChi']) || !is_numeric($employeeData['luong'])) {
            throw new Exception("Invalid input parameters for employee.");
        }
    
        $condition = "maNV = :maNV";
        $employeeData['maNV'] = $maNhanVien;
        $this->update($this->table, $employeeData, $condition);
    
        return true;
    }
    

    public function getEmployee($maNhanVien) {
        $condition = "maNV = :maNhanVien";
        return $this->fetch($this->table, $condition, ['maNhanVien' => $maNhanVien]);
    }

    public function deleteEmployee($maNhanVien) {
        $deletedEmployee = $this->delete($this->table, "maNV = :maNhanVien", ['maNhanVien' => $maNhanVien]);
    
        $deletedAccount = $this->delete('tai_khoan', "ID = :maNhanVien", ['maNhanVien' => $maNhanVien]);
    
        return true;
    }
    

    public function getAllEmployees() {
        $sql = "SELECT nv.maNV, nv.hoTen, nv.gioiTinh, nv.ngaySinh, nv.diaChi, nv.luong,tk.email, tk.vaiTro
                FROM $this->table as nv
                JOIN tai_khoan as tk ON nv.maNV = tk.ID";
        return $this->fetchAll($sql);
    }

    private function validateDate($date, $format = 'Y-m-d') {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) === $date;
    }
}
?>
