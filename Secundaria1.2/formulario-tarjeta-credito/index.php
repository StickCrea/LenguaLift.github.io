<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Planes_Pagar</title>
	<link href="https://fonts.googleapis.com/css?family=Lato|Liu+Jian+Mao+Cao&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/estilos.css">
	<script src="https://kit.fontawesome.com/51877c6006.js" crossorigin="anonymous"></script>
	<link rel="shortcut icon" href="img/logos/Logo_1.png">

</head>

<body>


	<div class="contenedor">

		<!-- Tarjeta -->
		<section class="tarjeta" id="tarjeta">
			<div class="delantera">
				<div class="logo-marca" id="logo-marca">
					<!-- <img src="img/logos/visa.png" alt=""> -->
				</div>
				<img src="img/chip-tarjeta.png" class="chip" alt="">
				<div class="datos">
					<div class="grupo" id="numero">
						<p class="label">Número Tarjeta</p>
						<p class="numero">#### #### #### ####</p>
					</div>
					<div class="flexbox">
						<div class="grupo" id="nombre">
							<p class="label">Nombre Tarjeta</p>
							<p class="nombre">Stiv Cuesta</p>
						</div>

						<div class="grupo" id="expiracion">
							<p class="label">Expiracion</p>
							<p class="expiracion"><span class="mes"  >MM</span> / <span class="year">AA</span></p>
						</div>
					</div>
				</div>
			</div>

			<div class="trasera">
				<div class="barra-magnetica"></div>
				<div class="datos">
					<div class="grupo" id="firma">
						<p class="label">Firma</p>
						<div class="firma"><p></p></div>
					</div>
					<div class="grupo" id="ccv">
						<p class="label">CCV</p>
						<p class="ccv"></p>
					</div>
				</div>
				<p class="leyenda">Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus exercitationem, voluptates illo.</p>
				<a href="#" class="link-banco">www.tubanco.com</a>
			</div>
		</section>

		<!-- Contenedor Boton Abrir Formulario -->
		<div class="contenedor-btn">
			<button type="submit" class="btn-abrir-formulario" id="btn-abrir-formulario">
				<i class="fas fa-plus"></i>
			</button>
		</div>

		<!-- Formulario -->
		<form action="formulario-tarjeta.php" id="formulario-tarjeta" class="formulario-tarjeta" onsubmit="return validarFormulario()">
	<div class="grupo">
		<label for="inputNumero">Número Tarjeta</label>
		<input type="text" id="inputNumero" name="inputNumero" maxlength="19" autocomplete="off">
	</div>
	<div class="grupo">
		<label for="inputNombre">Nombre</label>
		<input type="text" id="inputNombre" name="inputNombre" maxlength="19" autocomplete="off">
	</div>
	<div class="flexbox">
		<div class="grupo expira">
			<label for="selectMes">Expiracion</label>
			<div class="flexbox" name="seletMes">
				<div class="grupo-select">
					<select id="selectMes">
						<option disabled selected name="mes">Mes</option>
					</select>
					<i class="fas fa-angle-down"></i>
				</div>
				<div class="grupo-select">
					<select name="selectYear" id="selectYear">
						<option disabled selected name="selectYear">Año</option>
					</select>
					<i class="fas fa-angle-down"></i>
				</div>
			</div>
		</div>

		<div class="grupo ccv">
			<label for="inputCCV">CCV</label>
			<input type="text" id="inputCCV" name="inputCCV" maxlength="3">
		</div>
	</div>
	<div class="grupo-Plan">
		<label for="selectPlan">Selecciona tu Plan</label>
		<div class="grupo-seleccionar" name="selectPlan">
			<select  id="selectPlan" name="selectPlan">
				<option disabled selected >Plan</option>
				<option value="basico" name="selectPlan">Básico</option>
				<option value="intermedio" name="selectPlan">Intermedio</option>
				<option value="avanzado" name="selectPlan">Avanzado</option>
			</select>
		</div>
		<br><br>
	</div>

	<button type="submit" class="btn-enviar">Enviar</button>

</form>

<script>
	function validarFormulario() {
  // obtener los valores de los campos del formulario
  var numeroTarjeta = document.getElementById("inputNumero").value;
  var nombre = document.getElementById("inputNombre").value;
  var mesExpiracion = document.getElementById("selectMes").value;
  var yearExpiracion = document.getElementById("selectYear").value;
  var ccv = document.getElementById("inputCCV").value;
  var plan = document.getElementById("selectPlan").value;

  // verificar si los campos están llenos
  if (
    numeroTarjeta == "" ||
    nombre == "" ||
    mesExpiracion == "" ||
    yearExpiracion == "" ||
    ccv == "" ||
    plan == ""
  ) {
    // si alguno de los campos está vacío, mostrar un mensaje de error
    alert("Por favor, complete todos los campos.");
    return false; // impedir que el formulario se envíe
  }

  // si todos los campos están llenos, permitir el envío del formulario
  return true;
}

</script>

		
		<p class="titleEfec">Realiza Tu Pago En Efectivo </p>
		<div class="Efectivo" >
		<ul>
			<li>Bancolombia
				<ul>
					<li>
						Ahorro : ############
					</li>
				</ul>
			</li>
			<li>Nequi
				<ul>
					<li>
						Tel: 3124068418 <br><br>
						Tel : 3204873063
					</li>
				</ul>
			</li>
			<li>Daviplta
				<ul>
					<li>
						Tel: 3124068418 <br><br>
						Tel : 3204873063
					</li>
				</ul>
			</li>
			</li>
			<li>Davivienda
				<ul>
					<li>
						Tel: 3124068418  <br><br>
						Tel : 3204873063
					</li>
				</ul>
			</li>
			</li>
		 </ul>

		</div>
	</div>

	<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
	<script src="js/main.js"></script>
	<footer> 
		<h3>Redes Sociales</h3>
		<div class="Redes">
		 <a href="#" class="fb"><i class= "fa-brands fa-facebook" ></i></a>
			
		  <a href="#"class="ig"><i class="fa-brands fa-instagram"></i></a>

		  <a href="#"class="tw"><i class="fa-brands fa-twitter" ></i></a>

		  <a href="#"class="yt"><i class="fa-brands fa-youtube" ></i></a></li> 

		  <a href="#"class="what"><i class="fa-brands fa-whatsapp"></i></a></li> 
		  

		
		  <hr>
		  <div class="Copyrigth">

			 <p>&copy; 2023 LinguaLift. Todos los derechos reservados.</p>

		  </div>
	  
	</footer>
	
</body>
</html>
<