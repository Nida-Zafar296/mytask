<?php
class Database {
    private static $instance = null;
    private $conn;

    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'Database';

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->conn;
    }
    private function __clone() {}
    public function __wakeup() {}
}
?>
