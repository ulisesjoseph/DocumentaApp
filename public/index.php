<?php
session_start();

// Si el usuario está autenticado, redirigir al dashboard
if (isset($_SESSION['user'])) {
    header("Location: ../app/views/dashboard.php");
    exit();
}

// Si no está autenticado, mostrar el formulario de login
header("Location: ../app/views/login.php");
exit();
?>
