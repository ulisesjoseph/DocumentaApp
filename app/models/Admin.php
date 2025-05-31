<?php
require_once '../config/database.php';

class Admin
{
    private $conn;
    private $table = "admins";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function login($username, $password)
    {
        $query = "SELECT * FROM {$this->table} WHERE username = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            $stmt->close();  // Cerramos el statement
            $this->conn->close();  // Cerramos la conexión
            return password_verify($password, $user['password']) ? $user : false;
        }

        $stmt->close();
        $this->conn->close();
        return false;
    }
}
