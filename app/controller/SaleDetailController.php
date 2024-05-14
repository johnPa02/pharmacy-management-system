<?php
require_once '../../core/Controller.php';
class SaleDetailController extends Controller {
    private $saleDetailModel;
    private $saleModel;

    public function __construct() {
        $this->saleDetailModel = $this->model('SaleDetail');
        $this->saleModel = $this->model('Sale');
    }

    
    public function addSaleDetailSubmit() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $saleDetailData = [
                'maHDB' => $_POST['maHDB'],
                'maThuoc' => $_POST['maThuoc'],
                'soLuong' => $_POST['soLuong'],
                'giaTien' => $_POST['giaTien']
            ];

            try {
                $result = $this->saleDetailModel->addSaleDetail($saleDetailData);
                if ($result) {
                    
                    $this->saleModel->updateTotalPrice($_POST['maHDB']);
                    header('Location: /saleDetail/viewSaleDetails?maHDB=' . $_POST['maHDB']);
                    exit;
                } else {
                    $this->view('saleDetail/newSaleDetail', ['error' => 'Failed to add sale detail']);
                }
            } catch (Exception $e) {
                $this->view('saleDetail/newSaleDetail', ['error' => $e->getMessage()]);
            }
        }
    }

    
    public function deleteSaleDetail($id) {
        try {
            $detail = $this->saleDetailModel->getSaleDetail($id);
            $maHDB = $detail['maHDB'];

            $result = $this->saleDetailModel->deleteSaleDetail($id);
            if ($result) {
                
                $this->saleModel->updateTotalPrice($maHDB);

                header('Location: /saleDetail/viewSaleDetails?maHDB=' . $maHDB);
                exit;
            } else {
                $this->view('saleDetail/viewSaleDetails', ['error' => 'Failed to delete sale detail']);
            }
        } catch (Exception $e) {
            $this->view('saleDetail/viewSaleDetails', ['error' => $e->getMessage()]);
        }
    }
}

?>