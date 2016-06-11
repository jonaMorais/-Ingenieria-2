<!DOCTYPE html>

<html>

	<?php

		require_once('sesion_class.php');
		$sesion= new sesion;
		if($sesion->get()==false){
			?>
				<script language="javascript">
					alert('Acceso denegado.');
					window.location.href="index.php";
				</script>
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


			
			<form class="form-horizontal" action="validarClave.php" method="POST" onsubmit=" return validarClave(this)">

				<fieldset>
					
					<b>
						<h3>Cambio de contraseña</h3>
					</b>
					<div class="form-group">
						<label for="claveAct">*Contraseña actual:</label>
						<input class="form-control" type="password" id="claveAct" name="claveAct" placeholder="Ingrese su contraseña actual">
					</div>

					<div class="form-group">
						<label for="pass1">*Contraseña nueva:</label>
						<input class="form-control" type="password" id="pass1" name="pass1" placeholder="Ingrese su nueva contraseña">
					</div>

					<div class="form-group">
						<label for="pass2">*Confirmar contraseña nueva:</label>
						<input class="form-control" type="password" id="pass2" name="pass2" placeholder="Reingrese su nueva contraseña">
					</div>

					<p>Todos los campos con * son obligatorios</p>

					<input class="btn btn-color" type="button" value="Volver" onclick="history.back(-1)">
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