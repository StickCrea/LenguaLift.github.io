<?php

// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lengualift";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificar la conexión
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Obtener los valores del formulario
$numtarjeta = isset($_POST["inputNumero"]) ? $_POST["inputNumero"] : "";
$nombre = isset($_POST["inputNombre"]) ? $_POST["inputNombre"] : "";
$plan = isset($_POST["selectPlan"]) ? $_POST["selectPlan"] : "";

// Insertar los valores en la tabla
$sql = "INSERT INTO tarjetas (numero_tarjeta, nombre,  planx) VALUES ('$numtarjeta', '$nombre', '$plan')";
if (mysqli_query($conn, $sql)) {
    $mensaje= "Datos almacenados correctamente";
} else {
    $mensaje= "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Cerrar la conexión
mysqli_close($conn);
?>
<script>
    alert("<?php echo $mensaje; ?>");
    window.location.href = "..index.php";
</script>

