<!DOCTYPE html>

<html>

	<?php
		require_once('sesion_class.php');
		$sesion= new sesion;
		if($sesion->get()!=false){
			if($sesion->getRoll()!=1){
				?><script type="text/javascript">alert("Usted no es administrador.");</script>
				<script type="text/javascript">window.location.replace("./index.php");</script>
				<?php
			}
		}
		else{
			?><script type="text/javascript">alert("Acceso denegado.");</script>
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

			<h3>Administracion</h3>

			<form class="form-horizontal" action="validarTipoCouch.php" method="POST" onsubmit=" return validarNuevoCouch(this)">
				<fieldset>
					
						<b>
							<h3>Agregar tipo de Couch</h3>
						</b>
						<div class="form-group">
							<label for="tipo">Nombre tipo de Couch</label>
							<input class="form-control" type="text" id="tipo" name="tipo" placeholder="Nombre del Couch nuevo">
						</div>

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