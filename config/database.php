<?php
class Database {
    private $host = "127.0.0.1";  // Servidor local
    private $db_name = "documentaapp";  // Nombre de la base de datos
    private $username = "root";  // Usuario por defecto en XAMPP/MAMP
    private $password = "";  // Si no has establecido contraseña, deja vacío
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
            if ($this->conn->connect_error) {
                throw new Exception("Error de conexión: " . $this->conn->connect_error);
            }
        } catch (Exception $e) {
            die("Conexión fallida: " . $e->getMessage());
        }
        return $this->conn;
    }
}
?>
