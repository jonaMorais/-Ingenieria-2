<!DOCTYPE html>

<html>

	<?php

		require_once('sesion_class.php');
		$sesion= new sesion;
		if($sesion->get()!=false){
			?><script type="text/javascript">alert("Usted ya se encuentra registrado.");</script>
			<script type="text/javascript">window.location.replace("./index.php");</script>
			<?php
		}
		//---Incluimos el head
		include_once('view/head.html');

	?>


	<body class="container">

		<?php

			//---Incluimos el header
			include_once('view/header.html');

			//---Incluimos el nav
			include_once('view/navBar/navBar.php');

		?>

		<main>


			<div id="lateral" class="panel panel-success">
				<div class="panel-heading-custom">
					<h3 class="panel-title">Panel title</h3>
				</div>
				<div class="panel-body">
					<ul id="opciones">
						<li><a href="#">Opcion numero 1</a></li>
						<li><a href="#">Opcion numero 2</a></li>
						<li><a href="#">Opcion numero 3</a></li>
						<li><a href="#">Opcion numero 4</a></li>
						<li><a href="#">Opcion numero 5</a></li>
						<li><a href="#">Opcion numero 6</a></li>
					</ul>
				</div>
			</div>


			<form class="form-horizontal" action="add_user.php" method="POST" onsubmit=" return validarUsuarioAdd()">
				<fieldset>	
					<b>
						<h3>Registrarse:</h3>
					</b>
					<div class="form-group">
						<label for="mail">E-mail:</label>
						<input class="form-control" type="text" id="mail" name="mail" placeholder="Ingrese su mail">
					</div>
					<div class="form-group">
						<label for="nombre">Nombre:</label>
						<input class="form-control" type="text" id="nombre" name="nombre" placeholder="Ingrese su nombre">
					</div>
					<div class="form-group">
						<label for="apellido">Apellido:</label>
						<input class="form-control" type="text" id="apellido" name="apellido" placeholder="Ingrese su apellido">
					</div>
					<div class="form-group">
						<label for="pass">Contraseña:</label>
						<input class="form-control" type="password" id="pass" name="pass" placeholder="Ingrese su contraseña">
					</div>
					<div class="form-group">
						<label for="fecha">Fecha de nacimiento:</label>
						<input class="form-control" type="text" id="datepicker" name="datepicker" placeholder="Ingrese su fecha de nacimineto" readonly>
					</div>
					<div class="form-group">
						<label for="telefono">Telefono:</label>
						<input class="form-control" type="number" id="telefono" name="telefono" placeholder="Ingrese su telefono">
					</div>
					<input class="btn btn-color" type="submit" value="Enviar">
				</fieldset>
			</form>

		</main>
		
		<blockquote>

			<footer>

				Grupo 16

			</footer>

		</blockquote>	

	</body>

</html>