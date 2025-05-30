<?php
session_start();
require_once '../config/database.php';
require_once '../models/User.php';

$database = new Database();
$db = $database->getConnection();
$userModel = new User($db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = $userModel->login($username, $password);
    if ($user) {
        $_SESSION['user'] = $user['username'];
        header("Location: ../views/dashboard.php");
        exit();
    } else {
        echo "Usuario o contraseña incorrectos.";
    }
}
?>
