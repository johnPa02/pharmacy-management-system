<?php
require_once './core/Controller.php';
require_once BASE_PATH .'/app/model/Sale.php';

class SaleController extends Controller {
    
    public function addSale() {
        $content = $this->view('sale/add_sale', [], true);
        include './app/view/layout.php';
    }
    
    public function addSaleSubmit() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $maKH = $_POST['maKH'];  
            $maNV = $_SESSION['user_id'] ?? null;  
            
            
            $ngayLap = date('Y-m-d H:i:s');
    
            
            $tongGia = 0;
    
            
            $drugIds = $_POST['maThuoc'] ?? [];
            $quantities = $_POST['soLuong'] ?? [];
            $prices = $_POST['giaBan'] ?? [];
    
            foreach ($drugIds as $index => $drugId) {
                if (!isset($quantities[$index]) || !isset($prices[$index])) {
                    continue;
                }
                $quantity = $quantities[$index];
                $price = $prices[$index];
                $tongGia += $quantity * $price; 
            }
    
            
            $saleData = [
                'maKH' => $maKH,
                'maNV' => $maNV,
                'ngayLap' => $ngayLap,
                'tongGia' => $tongGia
            ];
    
            
            $saleModel = $this->model('Sale');
            $saleDetailModel = $this->model('SaleDetail');
            try {
                
                $saleId = $saleModel->addSale($saleData);
    
                
                foreach ($drugIds as $index => $drugId) {
                    if (!isset($quantities[$index]) || !isset($prices[$index])) {
                        continue;
                    }
                    $saleDetail = [
                        'maHDB' => $saleId,
                        'maThuoc' => $drugId,
                        'soLuong' => $quantities[$index],
                        'giaTien' => $prices[$index]
                    ];
                    $saleDetailModel->addSaleDetail($saleDetail);
                }
    
                
                header('Location: http://localhost:8083/saleDetail/' . $saleId);
                exit;
            } catch (Exception $e) {
                
                $content = $this->view('sale/add_sale', ['error' => $e->getMessage()], true);
                include './app/view/layout.php';
            }
        }
    }
    

    
    public function viewSales() {
        $saleModel = $this->model('Sale');
        $sales = $saleModel->getAllSales();
        $this->view('sales/viewSales', ['sales' => $sales]);
    }

    
    public function saleDetail($maHDB) {
        $saleModel = $this->model('Sale');
        $sale= $saleModel->getSale($maHDB);
        $saleDetailModel = $this->model('SaleDetail');
        $saleDetails = $saleDetailModel->getAllSaleDetails($maHDB);
        $employeeModel = $this->model('Employee');
        $customerModel = $this->model('Customer');
        $employee = $employeeModel->getEmployee($sale['maNV']);
        $customer = $customerModel->getCustomer($sale['maKH']);
        $sale['tenNV'] = $employee['hoTen'] ?? '';
        $sale['tenKH'] = $customer['hoTen'] ?? '';
        foreach ($saleDetails as &$saleDetail) {
            $drugModel = $this->model('Drug');
            $drug = $drugModel->getDrug($saleDetail['maThuoc']);
            $saleDetail['tenThuoc'] = $drug['tenThuoc'] ?? '';
        }

        $content = $this->view('sale/sale_detail', ['sale' => $sale, 'saleDetails' => $saleDetails], true);
        include './app/view/layout.php';
    }

    
    public function salesHistory() {
        
        $saleModel = $this->model('Sale');
        $salesHistory = $saleModel->getAllSales();  
        $this->view('sales/salesHistory', ['salesHistory' => $salesHistory]);
    }
}
?>
