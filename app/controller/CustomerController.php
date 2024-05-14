<?php
require_once '../core/Controller.php';
require_once BASE_PATH .'/app/model/Customer.php';

class CustomerController extends Controller {

    
    public function manageCustomers() {
        $customerModel = $this->model('Customer');
        $customers = $customerModel->getAllCustomers();
        $content = $this->view('customer/manage_customer', ['customers' => $customers], true);
        include '../app/view/layout.php';
    }

    
    public function addCustomer() {
        $content = $this->view('customer/add_customer',[], true);
        include '../app/view/layout.php';
    }
    
    public function addCustomerSubmit() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $customerData = [
                'hoTen' => $_POST['hoTen'],
                'gioiTinh' => $_POST['gioiTinh'],
                'ngaySinh' => $_POST['ngaySinh'],
                'diaChi' => $_POST['diaChi'],
            ];
            $accountData = [
                'email' => $_POST['email'],
                'matKhau' => password_hash($_POST['password'], PASSWORD_DEFAULT)
            ];
            $customerModel = $this->model('Customer');
            try {
                $result = $customerModel->addCustomer($customerData, $accountData);
                if ($result) {
                    header('Location: manageCustomers');
                    exit;
                } else {
                    $content = $this->view('customer/add_customer', ['error' => 'Thêm khách hàng không thành công']);
                    include '../app/view/layout.php';
                }
            } catch (Exception $e) {
                $content = $this->view('customer/add_customer', ['error' => $e->getMessage()], true);
                include '../app/view/layout.php';
                
            }
        }
    }

    
    public function updateCustomer($maKH) {
        $customerModel = $this->model('Customer');
        $currentCustomer = $customerModel->getCustomer($maKH);
        $accountModel = $this->model('Account');
        $currentAccount = $accountModel->getAccount($maKH);
        $currentCustomer['email'] = $currentAccount['email'];
        $content = $this->view('customer/edit_customer', ['customer' => $currentCustomer], true);
        include '../app/view/layout.php';
    }

    
    public function updateCustomerSubmit($maKH) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $customerData = [
                'hoTen' => $_POST['hoTen'],
                'gioiTinh' => $_POST['gioiTinh'],
                'ngaySinh' => $_POST['ngaySinh'],
                'diaChi' => $_POST['diaChi'],
            ];
            $accountData = [
                'email' => $_POST['email'],
                'matKhau' => password_hash($_POST['password'], PASSWORD_DEFAULT)
            ];
            $customerModel = $this->model('Customer');
            try {
                $customerModel->updateCustomer($maKH, $customerData, $accountData);
                header('Location: /pharmacy-management-system/public/index.php/manageCustomers');
                exit;

            } catch (Exception $e) {
                $this->view('customer/edit_customer', ['error' => $e->getMessage(), 'maKH' => $maKH]);
                include '../app/view/layout.php';
            }
        }
    }

    
    public function deleteCustomer($maKH) {
        $customerModel = $this->model('Customer');
        try {
            $customerModel->deleteCustomer($maKH);
            header('Location: /pharmacy-management-system/public/index.php/manageCustomers');
            exit;   
        } catch (Exception $e) {
            $this->view('manageCustomers', ['error' => $e->getMessage()], true);
        }
    }

    
    public function getCustomerDetails($maKH) {
        $customerModel = $this->model('Customer');
        $customerDetails = $customerModel->getCustomer($maKH);
        header('Content-Type: application/json');
        if ($customerDetails) {
            echo json_encode($customerDetails);
        } else {
            echo json_encode(['error' => 'No customer found']);
        }
        exit;
    }
    
}
?>
