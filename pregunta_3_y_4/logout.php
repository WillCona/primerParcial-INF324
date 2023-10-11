<?php
// Iniciar sesión
session_start();

// Destruir todas las variables de sesión
session_destroy();

// Redirigir al usuario de vuelta a la página de inicio de sesión
header('Location: login_form.php');
?>
