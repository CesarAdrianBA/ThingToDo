<?php
session_start();

// Verificar si el usuario no está autenticado
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php'); // Redirigir al usuario al formulario de inicio de sesión si no está autenticado
    exit;
}

// Verificar si la sesión ha expirado
if (time() > $_SESSION['expire_time']) {
    session_unset(); // Eliminar todas las variables de sesión
    session_destroy(); // Destruir la sesión
    header('Location: login.php'); // Redirigir al usuario al formulario de inicio de sesión si la sesión ha expirado
    exit;
}

?>
