<?php
require_once './core/Controller.php';
require_once './app/model/Account.php';

class AuthController extends Controller {

    public function login() {
        $this->view('auth/login', [], false);
    }

    public function loginSubmit() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email']) && isset($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $accountModel = $this->model('Account');
            $account = $accountModel->login($email, $password);

            if ($account) {
                $_SESSION['user_id'] = $account['ID'];
                $_SESSION['user_email'] = $account['email'];
                $_SESSION['user_role'] = $account['vaiTro'];
                if ($account['vaiTro'] == 'admin') {
                    header('Location: manageCustomers');
                } else if ($account['vaiTro'] == 'customer') {
                    header('Location: /customer/dashboard');
                } else if ($account['vaiTro'] == 'Dược sĩ') {
                    header('Location: listDrugs');
                }
                exit;
            } else {
                $this->view('auth/login', ['error' => 'Tài khoản hoặc mật khẩu không đúng'], false);
            }
        }
    }





    public function logout() {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        session_destroy();
        header('Location: /login');
        exit;
    }
}
