<?php
require_once BASE_PATH . '/core/Model.php';

class Account extends Model {
    private $table = 'tai_khoan';

    // public function register($email, $password) {
    //     $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    //     $data = [
    //         'email' => $email,
    //         'matKhau' => $hashedPassword
    //     ];

    //     return $this->insert($this->table, $data);
    // }

    public function login($email, $password) {
        $account = $this->fetch($this->table, 'email = :email', ['email' => $email]);
        if ($account && password_verify($password, $account['matKhau'])) {
    
            return $account;
        }
        return false;
    }

    public function updatePassword($email, $oldPassword, $newPassword) {
        $account = $this->fetch($this->table, 'email = :email', ['email' => $email]);
        if ($account && password_verify($oldPassword, $account['matKhau'])) {
            $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $this->update($this->table, ['matKhau' => $hashedNewPassword], 'email = :email');
            return true;
        }
        return false;
    }

    public function getAccount($id) {
        return $this->fetch($this->table, 'ID = :id', ['id' => $id]);
    }
}
?>
