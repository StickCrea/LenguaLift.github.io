<?php


  // Conexión a la base de datos
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "lengualift";

  $conn = mysqli_connect($servername, $username, $password, $dbname);
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  $mensaje= "Connected successfully";

  // Insertar datos en la tabla
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $numTarjeta = $_POST['Numtarjeta'];
  $nombre = $_POST['Nombre'];
  $plan = $_POST['plan'];

  // Insertar datos en la tabla planes_pagos
  $sql = "INSERT INTO planes_pagos (num_tarjeta, nombre, mes, year, ccv, plan) 
          VALUES ('$numTarjeta', '$nombre', '$plan')";

  if (mysqli_query($conexion, $sql)) {
    echo "Datos insertados correctamente";
  } else {
    echo "Error al insertar datos: " . mysqli_error($conexion);
  }

  mysqli_close($conexion);
}

?>

 <script>
  alert("<?php echo $mensaje; ?>");
      window.location.href = "index.html";
  
  mysqli_close($conn);

