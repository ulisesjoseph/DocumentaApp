<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>

<h1>Bienvenido, <?php echo $_SESSION['user']; ?>!</h1>
<a href="../controllers/LogoutController.php">Cerrar sesión</a>
