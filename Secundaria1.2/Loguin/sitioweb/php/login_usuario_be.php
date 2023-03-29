<?php

    session_start();

    include'conexion_be.php';

    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];    
    $contrasena = $_POST['contrasena'];

    $validar_login = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo='$correo'
    and contrasena='$contrasena'");

    if(mysqli_num_rows($validar_login) > 0){
        $_SESSION['usuario'] = $correo;
        $_SESSION["username"] = $user;
        header("location: ../administrador/inicio.php");
        exit;
    }else{
        echo'
            <script>
                alert("Contraseña o correo no existen, por favor verifique los datos introducidos");
                window.location = "../login.php";
            </script>
        
        ';
        exit;
    }

?>
