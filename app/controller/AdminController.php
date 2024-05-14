<?php
require_once '../../core/Controller.php';
require_once '../model/Drug.php';
require_once '../model/Supplier.php';
require_once '../model/Sale.php';

class AdminController extends Controller {

    public function dashboard() {
        $this->view('admin/dashboard');
    }

    public function manageDrugs() {
        $drugModel = $this->model('Drug');
        $drugs = $drugModel->listDrugs();
        $this->view('admin/manageDrugs', ['drugs' => $drugs]);
    }

    public function salesReports() {
        $saleModel = $this->model('Sale');
        $salesReport = $saleModel->generateSalesReport();
        $this->view('admin/salesReports', ['salesReport' => $salesReport]);
    }
}
