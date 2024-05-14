<?php
require_once BASE_PATH . '/app/middleware/AuthMiddleware.php';

class Router {
    private $routes = [];

    public function __construct() {
        $this->initRoutes();
    }

    private function initRoutes() {
        $this->routes = [
            'login' => [
                'controller' => 'AuthController',
                'action' => 'login',
                'middleware' => []
            ],
            'logout' => [
                'controller' => 'AuthController',
                'action' => 'logout',
                'middleware' => []
            ],
            'loginSubmit' => [
                'controller' => 'AuthController',
                'action' => 'loginSubmit',
                'middleware' => []
            ],
            'logout' => [
                'controller' => 'AuthController',
                'action' => 'logout',
                'middleware' => []
            ],
            'register' => [
                'controller' => 'AuthController',
                'action' => 'register',
                'middleware' => []
            ],
            'manageEmployees' => [
                'controller' => 'EmployeeController',
                'action' => 'manageEmployees',
                'middleware' => ['AuthMiddleware']
            ],
            'addEmployee' => [
                'controller' => 'EmployeeController',
                'action' => 'addEmployee',
                'middleware' => ['AuthMiddleware']
            ],
            'addEmployeeSubmit' => [
                'controller' => 'EmployeeController',
                'action' => 'addEmployeeSubmit',
                'middleware' => ['AuthMiddleware']
            ],
            'deleteEmployee/:id' => [
                'controller' => 'EmployeeController',
                'action' => 'deleteEmployee',
                'middleware' => ['AuthMiddleware']
            ],
            'updateEmployee/:id' => [
                'controller' => 'EmployeeController',
                'action' => 'updateEmployee',
                'middleware' => ['AuthMiddleware']
            ],
            'updateEmployeeSubmit/:id' => [
                'controller' => 'EmployeeController',
                'action' => 'updateEmployeeSubmit',
                'middleware' => ['AuthMiddleware']
            ],
            
            'manageCustomers' => [
                'controller' => 'CustomerController',
                'action' => 'manageCustomers',
                'middleware' => ['AuthMiddleware']
            ],
            'addCustomer' => [
                'controller' => 'CustomerController',
                'action' => 'addCustomer',
                'middleware' => ['AuthMiddleware']
            ],
            'addCustomerSubmit' => [
                'controller' => 'CustomerController',
                'action' => 'addCustomerSubmit',
                'middleware' => ['AuthMiddleware']
            ],
            'deleteCustomer/:id' => [
                'controller' => 'CustomerController',
                'action' => 'deleteCustomer',
                'middleware' => ['AuthMiddleware']
            ],
            'getCustomerDetails/:id' => [
                'controller' => 'CustomerController',
                'action' => 'getCustomerDetails',
                'middleware' => []
            ],
            'updateCustomer/:id' => [
                'controller' => 'CustomerController',
                'action' => 'updateCustomer',
                'middleware' => ['AuthMiddleware']
            ],
            'updateCustomerSubmit/:id' => [
                'controller' => 'CustomerController',
                'action' => 'updateCustomerSubmit',
                'middleware' => ['AuthMiddleware']
            ],
            'listSuppliers' => [
                'controller' => 'SupplierController',
                'action' => 'listSuppliers',
                'middleware' => ['AuthMiddleware']
            ],
            'addSupplier' => [
                'controller' => 'SupplierController',
                'action' => 'addSupplier',
                'middleware' => ['AuthMiddleware']
            ],
            'addSupplierSubmit' => [
                'controller' => 'SupplierController',
                'action' => 'addSupplierSubmit',
                'middleware' => ['AuthMiddleware']
            ],
            'deleteSupplier/:id' => [
                'controller' => 'SupplierController',
                'action' => 'deleteSupplier',
                'middleware' => ['AuthMiddleware']
            ],
            'updateSupplier/:id' => [
                'controller' => 'SupplierController',
                'action' => 'updateSupplier',
                'middleware' => ['AuthMiddleware']
            ],
            'updateSupplierSubmit/:id' => [
                'controller' => 'SupplierController',
                'action' => 'updateSupplierSubmit',
                'middleware' => ['AuthMiddleware']
            ],
            'listDrugs' => [
                'controller' => 'DrugController',
                'action' => 'listDrugs',
                'middleware' => ['AuthMiddleware']
            ],
            'addDrug' => [
                'controller' => 'DrugController',
                'action' => 'addDrug',
                'middleware' => ['AuthMiddleware']
            ],
            'addDrugSubmit' => [
                'controller' => 'DrugController',
                'action' => 'addDrugSubmit',
                'middleware' => ['AuthMiddleware']
            ],
            'updateDrug/:id' => [
                'controller' => 'DrugController',
                'action' => 'updateDrug',
                'middleware' => ['AuthMiddleware']
            ],
            'updateDrugSubmit/:id' => [
                'controller' => 'DrugController',
                'action' => 'updateDrugSubmit',
                'middleware' => ['AuthMiddleware']
            ],
            'deleteDrug/:id' => [
                'controller' => 'DrugController',
                'action' => 'deleteDrug',
                'middleware' => ['AuthMiddleware']
            ],
            'searchDrugs' => [
                'controller' => 'DrugController',
                'action' => 'searchDrugs',
                'middleware' => ['AuthMiddleware']
            ],
            'searchDrugAPI/:searchTerm' => [
                'controller' => 'DrugController',
                'action' => 'apiSearchDrug',
                'middleware' => []
            ],
            'addSale' => [
                'controller' => 'SaleController',
                'action' => 'addSale',
                'middleware' => ['AuthMiddleware']
            ],
            'addSaleSubmit' => [
                'controller' => 'SaleController',
                'action' => 'addSaleSubmit',
                'middleware' => ['AuthMiddleware']
            ],
            'saleDetail/:id' => [
                'controller' => 'SaleController',
                'action' => 'saleDetail',
                'middleware' => []
            ],

            'sales/view' => [
                'controller' => 'SalesController',
                'action' => 'view',
                'middleware' => ['AuthMiddleware']
            ]
        ];
    }
    
    private function normalizeUrl($url) {
        // Remove query string
        $url = explode('?', $url)[0];
    
        // Remove the base path as before
        $basePath = '/pharmacy-management-system/public/index.php/';
        $url = preg_replace("#^" . preg_quote($basePath, '#') . "#", '', $url);
    
        // Ensure no leading or trailing slashes
        return trim($url, '/');
    }
    
    public function getRoute($url) {
        $url = $this->normalizeUrl($url);
        foreach ($this->routes as $pattern => $route) {
            // Replace placeholders with regex patterns to match URLs
            $regex = preg_replace('#:([\w]+)#', '([^/]+)', $pattern);
            if (preg_match('#^' . $regex . '$#', $url, $matches)) {
                array_shift($matches); // Remove the full match
                $route['params'] = $matches; // Assign parameters to the route
                return $route;
            }
        }
        return null;
    }
    

    public function dispatch($url) {
        $route = $this->getRoute($url);

        if ($route) {
            require_once '../app/controller/' . $route['controller'] . '.php';
            $url = $this->normalizeUrl($url);
            if ($this->processMiddlewares($route, new Request($url))) {
                $controllerName = $route['controller'];
                $actionName = $route['action'];
                if (class_exists($controllerName) && method_exists($controllerName, $actionName)) {
                    $controller = new $controllerName();
                    call_user_func_array([$controller, $actionName], $route['params']);
                } else {
                    $this->handleError("Controller or Action not found.");
                }
            } else {
                $this->handleError("Access denied.");
            }
        } else {
            $this->handleError("No route defined for this URL.");
        }
    }

    private function processMiddlewares($route, $request) {
        if (isset($route['middleware'])) {
            foreach ($route['middleware'] as $middlewareClass) {
                $middleware = new $middlewareClass();
                if (!$middleware->handle($request)) {
                    return false;
                }
            }
        }
        return true;
    }

    private function handleError($message) {
        echo $message;
        // Tùy chọn: có thể dẫn đến một trang lỗi tùy chỉnh
    }
}

?>