<?php
session_start();
session_destroy();
header('location: ../administrador/login_usuario_be.php');

?>