<!DOCTYPE html>

<html>

	<?php
		require_once('sesion_class.php');
		$sesion= new sesion;
		if($sesion->get()!=false){
			if($sesion->getRoll()!=1){
				?><script type="text/javascript">alert("Usted no es administrador.");</script><?php
				?><script type="text/javascript">window.location.replace("./index.php");</script><?php
			}
		}
		else{
			?><script type="text/javascript">alert("Acceso denegado.");</script><?php
			?><script type="text/javascript">window.location.replace("./index.php");</script><?php
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
		<form class="form-horizontal" action="visualizarListado.php" method="POST" onsubmit=" return validarResumenSoli(this)" >
			<fieldset>	
			<b>	<h3>Ingrese las fechas para el resumen: </h3></b>
				<div class="form-group">
					<label for="fecha">Fecha Inicio:</label>
					<input class="form-control" type="text" id="datepicker" name="datepicker" placeholder="Ingrese su fecha de inicio"  readonly>
				</div>
				<div class="form-group">
				<label for="fecha">Fecha Limite:</label>
					<input class="form-control" type="text" id="datepicker2" name="datepicker2" placeholder="Ingrese la fecha limite" readonly>
				</div>
				<input class="btn btn-color" type="button" value="Volver" onclick="window.location.href='./index.php'">
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