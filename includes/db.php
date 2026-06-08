<?php
require_once 'config.php';

class Database {
    private $conn;
    
    public function __construct() {
        $this->connect();
    }
    
    public function connect() {
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        
        if ($this->conn->connect_error) {
            die("خطأ في الاتصال بقاعدة البيانات: " . $this->conn->connect_error);
        }
        
        $this->conn->set_charset("utf8mb4");
    }
    
    public function query($sql) {
        $result = $this->conn->query($sql);
        if (!$result) {
            die("خطأ في الاستعلام: " . $this->conn->error);
        }
        return $result;
    }
    
    public function prepare($sql) {
        return $this->conn->prepare($sql);
    }
    
    public function escape($string) {
        return $this->conn->real_escape_string($string);
    }
    
    public function getConnection() {
        return $this->conn;
    }
    
    public function close() {
        $this->conn->close();
    }
}

$db = new Database();
?>