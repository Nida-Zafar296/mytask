<?php
require_once 'Database.php';

class User {
    private $conn;

    public function __construct() {
        $this->conn = Database::getInstance()->getConnection();

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function createUser($email, $password) {
        $stmt = $this->conn->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bind_param("ss", $email, $hashedPassword);
        return $stmt->execute();
    }

    public function getUserByEmail($email) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function verifyUser($email, $password) {
        $user = $this->getUserByEmail($email);
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_id'] = $user['id'];
            return true;
        }
        return false;
    }

    public function isLoggedIn() {
        return isset($_SESSION['user_email']);
    }

    public function logout() {
        session_unset();
        session_destroy();
    }
}
?>
