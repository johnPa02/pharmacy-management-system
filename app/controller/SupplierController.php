<?php
require_once './core/Controller.php';
require_once BASE_PATH . '/app/model/Supplier.php';  

class SupplierController extends Controller {

    
    public function listSuppliers() {
        $supplierModel = $this->model('Supplier');
        $suppliers = $supplierModel->getAllSuppliers();
        $content = $this->view('supplier/list_suppliers', ['suppliers' => $suppliers], true);
        include './app/view/layout.php';
    }

    
    public function addSupplier() {
        $content = $this->view('supplier/add_supplier', [], true);
        include './app/view/layout.php';
    }

    
    public function addSupplierSubmit() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'tenNCC' => $_POST['tenNCC'],
                'soDienThoai' => $_POST['soDienThoai'],
                'diaChi' => $_POST['diaChi']
            ];

            $supplierModel = $this->model('Supplier');
            try {
                $result = $supplierModel->addSupplier($data);
                header('Location: listSuppliers');
                exit;
            } catch (Exception $e) {
                $this->view('supplier/addSupplier', ['error' => $e->getMessage()]);
            }
        }
    }
    public function updateSupplier($maNCC) {
        $supplierModel = $this->model('Supplier');
        $currentSupplier = $supplierModel->getSupplier($maNCC);
        
        $content = $this->view('supplier/edit_supplier', ['supplier' => $currentSupplier], true);
        include './app/view/layout.php';
    }
    
    public function updateSupplierSubmit($maNCC) {
        $supplierModel = $this->model('Supplier');
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'tenNCC' => $_POST['tenNCC'],
                'soDienThoai' => $_POST['soDienThoai'],
                'diaChi' => $_POST['diaChi']
            ];

            try {
                $supplierModel->updateSupplier($maNCC, $data);
                header('Location: http://localhost:8083/listSuppliers');
                exit;
            } catch (Exception $e) {
                $this->view('supplier/editSupplier', ['error' => $e->getMessage(), 'maNCC' => $maNCC]);
            }
        } else {
            $supplier = $supplierModel->getSupplier($maNCC);
            $this->view('supplier/editSupplier', ['supplier' => $supplier]);
        }
    }

    
    public function deleteSupplier($maNCC) {
        $supplierModel = $this->model('Supplier');
        try {
            $supplierModel->deleteSupplier($maNCC);
            header('Location: http://localhost:8083/listSuppliers');
            exit;
        } catch (Exception $e) {
            $this->view('supplier/listSuppliers', ['error' => $e->getMessage()]);
        }
    }
}
?>
