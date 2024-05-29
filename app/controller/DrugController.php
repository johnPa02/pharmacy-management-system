<?php
require_once './core/Controller.php';
require_once BASE_PATH .'/app/model/Drug.php';

class DrugController extends Controller {

    
    public function listDrugs() {
        $drugModel = $this->model('Drug');
        $drugs = $drugModel->getAllDrugs();
        $supplierModel = $this->model('Supplier');
        $suppliers = $supplierModel->getAllSuppliers();
        $data = ['drugs' => $drugs, 'suppliers' => $suppliers];
        $content = $this->view('drug/list_drugs', $data, true);
        include './app/view/layout.php';
    }

    
    public function addDrug() {
        $drugModel = $this->model('Drug');
        $drugs = $drugModel->getAllDrugs();
        $supplierModel = $this->model('Supplier');
        $suppliers = $supplierModel->getAllSuppliers();
        $data = ['drugs' => $drugs, 'suppliers' => $suppliers];
        $content = $this->view('drug/add_drug', $data, true);
        include './app/view/layout.php';
    }

    public function addDrugSubmit() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/images/';
            $imageName = $_FILES['image']['name'];
            $imagePath = $uploadDir . basename($imageName);  
    
            if (move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {
                $data = [
                    'tenThuoc' => $_POST['tenThuoc'],
                    'giaBan' => $_POST['giaBan'],
                    'giaNhap' => $_POST['giaNhap'],
                    'loai' => $_POST['loai'], 
                    'hanSuDung' => $_POST['hanSuDung'],
                    'maNCC' => $_POST['maNCC'],
                    'image' => 'http://localhost:8083/images/' . basename($imageName) 
                ];
    
                $drugModel = $this->model('Drug');
                try {
                    $result = $drugModel->addDrug($data);
                    header('Location: listDrugs');
                    exit;
                } catch (Exception $e) {
                    $this->view('drug/addDrug', ['error' => $e->getMessage()]);
                }
            } else {
                $this->view('drug/addDrug', ['error' => 'Failed to upload image.']);
            }
        }
    }
    
    public function updateDrug($maThuoc) {
        $drugModel = $this->model('Drug');
        $currentdrug = $drugModel->getdrug($maThuoc);
        $supplierModel = $this->model('Supplier');
        $suppliers = $supplierModel->getAllSuppliers();
        $content = $this->view('drug/edit_drug', ['drug' => $currentdrug, 'suppliers' => $suppliers], true);
        include './app/view/layout.php';
    }

    public function updateDrugSubmit($maThuoc) {
        $drugModel = $this->model('Drug');
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $currentDrug = $drugModel->getDrug($maThuoc);
            $uploadDir = $_SERVER['DOCUMENT_ROOT'] . 'http://localhost:8083/images/';
            $data = [
                'giaBan' => $_POST['giaBan'],
                'giaNhap' => $_POST['giaNhap'],
                'hanSuDung' => $_POST['hanSuDung'],
                'maNCC' => $_POST['maNCC']
            ];
    
            
            if (!empty($_FILES['newImage']['name'])) {
                $imageName = $_FILES['newImage']['name'];
                $imagePath = $uploadDir . basename($imageName);
    
                if (file_exists($currentDrug['image'])) {
                    unlink($currentDrug['image']);  
                }
    
                
                if (move_uploaded_file($_FILES['newImage']['tmp_name'], $imagePath)) {
                    $data['image'] = 'http://localhost:8083/images/' . basename($imageName);
                } else {
                    $this->view('drug/editDrug', ['error' => 'Failed to upload new image.', 'maThuoc' => $maThuoc]);
                    return;
                }
            }
    
            
            try {
                $drugModel->updateDrug($maThuoc, $data);
                header('Location: http://localhost:8083/index.php/listDrugs');
                exit;
            } catch (Exception $e) {
                $this->view('error', ['error' => $e->getMessage(), 'maThuoc' => $maThuoc]);
            }
        } else {
            $drug = $drugModel->getDrug($maThuoc);
            $this->view('drug/editDrug', ['drug' => $drug]);
        }
    }

    
    public function deleteDrug($maThuoc) {
        $drugModel = $this->model('Drug');
        try {
            $drugModel->deleteDrug($maThuoc);
            header('Location: http://localhost:8083/index.php/listDrugs');
            exit;
        } catch (Exception $e) {
            $this->view('drug/listDrugs', ['error' => $e->getMessage()]);
        }
    }

    public function searchDrugs() {
        $drugModel = $this->model('Drug');
        $searchTerm = $_POST['searchTerm'] ?? '';  
        $drugs = $drugModel->searchDrugs($searchTerm);
        $data = ['drugs' => $drugs, 'searchTerm' => $searchTerm];
        $content = $this->view('drug/list_drugs', $data, true);
        include './app/view/layout.php';
    }
    public function apiSearchDrug($searchTerm) {
        $drugModel = $this->model('Drug');
        $drugs = $drugModel->searchDrugs($searchTerm);
        header('Content-Type: application/json');
        echo json_encode($drugs);
        exit;
    }
    
}
?>
