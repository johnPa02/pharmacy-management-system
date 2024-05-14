<?php
require_once '../core/Controller.php';

class EmployeeController extends Controller {

    public function manageEmployees() {
        $employeeModel = $this->model('Employee');
        $employees = $employeeModel->getAllEmployees();
        $content = $this->view('employee/manage_employees', ['employees' => $employees], true);
        include '../app/view/layout.php';
    }

    public function addEmployee() {
        $content = $this->view('employee/add_employee', [], true);
        include "../app/view/layout.php";
    }

    public function addEmployeeSubmit() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $employeeData = [
                'hoTen' => $_POST['hoTen'],
                'gioiTinh' => $_POST['gioiTinh'],
                'ngaySinh' => $_POST['ngaySinh'],
                'diaChi' => $_POST['diaChi'],
                'luong' => $_POST['luong'],
                
            ];
            $accountData = [
                'email' => $_POST['email'],
                'matKhau' => password_hash($_POST['password'], PASSWORD_DEFAULT),
                'vaiTro' => $_POST['role']
            ];
            $employeeModel = $this->model('Employee');
            try {
                $employeeModel->addEmployee($employeeData, $accountData);
                header('Location: /pharmacy-management-system/public/index.php/manageEmployees');
                exit;
            } catch (Exception $e) {
                $this->view('employee/addEmployee', ['error' => $e->getMessage()]);
            }
        }
    }

    public function updateEmployee($maNV) {
        $employeeModel = $this->model('Employee');
        $currentEmployee = $employeeModel->getEmployee($maNV);
        $accountModel = $this->model('Account');
        $currentAccount = $accountModel->getAccount($maNV);
        $currentEmployee['email'] = $currentAccount['email'];
        $currentEmployee['vaiTro'] = $currentAccount['vaiTro'];
        $content = $this->view('employee/edit_employee', ['employee' => $currentEmployee], true);
        include '../app/view/layout.php';
    }

    public function updateEmployeeSubmit($maNhanVien) {
        $employeeModel = $this->model('Employee');
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $employeeData = [
                'hoTen' => $_POST['hoTen'],
                'gioiTinh' => $_POST['gioiTinh'],
                'ngaySinh' => $_POST['ngaySinh'],
                'diaChi' => $_POST['diaChi'],
                'luong' => $_POST['luong'],
            ];
            $accountData = [
                'email' => $_POST['email'],
                'matKhau' => password_hash($_POST['password'], PASSWORD_DEFAULT),
                'vaiTro' => $_POST['role']
            ];
            try {
                $employeeModel->updateEmployee($employeeData, $accountData, $maNhanVien);
                header('Location: /pharmacy-management-system/public/index.php/manageEmployees');
                exit;
            } catch (Exception $e) {
                $this->view('employee/editEmployee', ['error' => $e->getMessage(), 'maNhanVien' => $maNhanVien]);
            }
        }
    }

    public function deleteEmployee($maNhanVien) {
        $employeeModel = $this->model('Employee');
        try {
            $employeeModel->deleteEmployee($maNhanVien);
            header('Location: /pharmacy-management-system/public/index.php/manageEmployees');
            exit;
        } catch (Exception $e) {
            $this->view('employee/manage_employees', ['error' => $e->getMessage()], true);
        }
    }

    public function getEmployeeDetails($maNhanVien) {
        $employeeModel = $this->model('Employee');
        $employeeDetails = $employeeModel->getEmployee($maNhanVien);
        $this->view('employee/employeeDetails', ['employee' => $employeeDetails]);
    }
}
?>
