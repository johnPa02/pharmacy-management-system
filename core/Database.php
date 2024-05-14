<?php

class Database {
    private static $instance = null;
    private $conn;

    private function __construct() {
        $this->conn = $this->connect();
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    private function connect() {
        $host = DB_HOST;
        $db_name = DB_NAME;
        $username = DB_USER;
        $password = DB_PASSWORD;
        $dsn = "mysql:host=$host;dbname=$db_name;charset=utf8mb4";

        try {
            $pdo = new PDO($dsn, $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $pdo;
        } catch (PDOException $e) {
            die("Failed to connect to the database: " . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->conn;
    }
}

?>
