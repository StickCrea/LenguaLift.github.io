<?php
session_start();

session_unset();

session_destroy();


// Redirige al usuario a la página de inicio de sesión
header("Location: login.php");
exit();
?>
