<?php

class AuthMiddleware {
    public function handle($request) {
        
        $userRole = $_SESSION['user_role'] ?? '';

        if (!$this->isAuthorized($userRole, $request->getUrl())) {
            header('Location: /login'); 
            exit;
        }

        return true;
    }

    private function isAuthorized($role, $url) {
        $accessControl = [
            'admin' => ['manageCustomers','addCustomer', 'addCustomerSubmit', 'updateCustomer',
                        'updateCustomerSubmit/:id', 'deleteCustomer/:id','updateCustomer/:id',
                        'listSuppliers', 'addSupplier', 'addSupplierSubmit', 'updateSupplier/:id','deleteSupplier/:id',
                        'updateSupplierSubmit/:id',
                        'manageEmployees', 'addEmployee', 'addEmployeeSubmit', 'updateEmployee/:id', 'updateEmployeeSubmit/:id',
                        'deleteEmployee/:id'],
            'khach' => ['/customer_dashboard', '/viewOrders'],
            'Dược sĩ' => ['listDrugs', 'addDrug', 'addDrugSubmit', 'updateDrug/:id', 'updateDrugSubmit/:id',
                        'deleteDrug/:id','searchDrugAPI/:searchTerm', 'searchDrugs',
                        'addSale', 'addSaleSubmit', 'listSales', 'updateSale/:id', 'updateSaleSubmit/:id',],
        ];
    
        foreach ($accessControl[$role] ?? [] as $allowedUrl) {
            
            $pattern = preg_quote($allowedUrl, '#');
            
            
            
            $pattern = preg_replace('/\\\:(\w+)/', '([^/]+)', $pattern);  
        
            
            if (preg_match('#^' . $pattern . '$#', $url)) {
                return true;
            }
        }
        
    
        return false; 
    }
    
}

?>
