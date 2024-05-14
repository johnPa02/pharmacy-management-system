<?php

require 'Database.php';
class Model {
    protected $db;
    
    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    protected function execute($sql, $params = []) {
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->execute($params);
            return $stmt;
        } catch (PDOException $e) {
            die("Failed to execute query: " . $e->getMessage());
        }
    }

    protected function fetchAll($sql, $params = []) {
        $stmt = $this->execute($sql, $params);
        return $stmt->fetchAll();
    }

    protected function insert($table, $data) {
        $keys = array_keys($data);
        $fields = implode(', ', $keys);
        $placeholders = ':' . implode(', :', $keys);

        $sql = "INSERT INTO $table ($fields) VALUES ($placeholders)";
        $this->execute($sql, $data);
        return $this->db->lastInsertId();
    }

    protected function update($table, $data, $condition) {
        $updates = array_map(function ($value) { return "$value = :$value"; }, array_keys($data));
        $sql = "UPDATE $table SET " . implode(', ', $updates) . " WHERE $condition";
        $this->execute($sql, $data);
    }

    protected function fetch($table, $condition, $params) {
        $sql = "SELECT * FROM $table WHERE $condition";
        $stmt = $this->execute($sql, $params);
        return $stmt->fetch();
    }

    protected function delete($table, $condition, $params) {
        $sql = "DELETE FROM $table WHERE $condition";
        $stmt = $this->execute($sql, $params);
    }
}

?>
