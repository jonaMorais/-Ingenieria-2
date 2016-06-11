<!DOCTYPE html>

<html>

	<?php

		require_once('sesion_class.php');
		$sesion = new sesion;
		if($sesion->get()==false){
			?><script type="text/javascript">alert("Acceso denegado.");</script>
			<script type="text/javascript">window.location.replace("./index.php");</script>
			<?php
		}
		else{
			if($sesion->getPremium()==1){
				if($sesion->getFechaPremium()!=null and $sesion->getFechaPremium()!="0000-00-00"){
					?><script type="text/javascript">alert("Usted ya es un usuario premium.");</script>
					<script type="text/javascript">window.location.replace("./index.php");</script>
					<?php
				}
			}
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
				<!-- FORMULARIO DE TARJETA  -->
			<!-- ACA SE INGRESA LOS DATOS DE LA TARJETA SE VERIFICA Y SE ACTIVA EL PREMIUM-->
			<form class="form-horizontal" action="activarpremium.php" method="POST" onsubmit=" return validarPremium()">
				<fieldset>	
					<b>
						<h3>Activar cuenta premium:</h3>
					</b>
					<input type="hidden" name="id" id="id" value=<?php echo $sesion->getIdUsuario();?>>
					<div class="form-group">
						<label for="tarjeta">*Nro de tarjeta de credito:</label>
						<input class="form-control" type="number" id="tarjeta" name="tarjeta" placeholder="Ingrese su nro de tarjeta de credito">
					</div>
					<div class="form-group">
						<label for="codigo">*Codigo de seguridad:</label>
						<input class="form-control" type="password" id="codigo" name="codigo" size="3" maxlength="3" placeholder="Ingrese los ultimos 3 digitos al dorso de su tarjeta">
					</div>
					<p>Todos los campos con * son obligatorios</p>
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
