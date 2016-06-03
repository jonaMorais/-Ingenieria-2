<!DOCTYPE html>

<html>

	<?php

		require_once('sesion_class.php');
		$sesion= new sesion;

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

			<div id="lateral" class="panel panel-success">
				<div class="panel-heading-custom">
					<h3 class="panel-title">Panel title</h3>
				</div>
				<div class="panel-body">
					<ul id="opciones">
						<li><a href="agregarTipo.php">Agregar tipo de couch</a></li>
						<li><a href="listarTipos.php">Listar tipos</a></li>
						<li><a href="#">Algo</a></li>
						<li><a href="#">Algo</a></li>
						<li><a href="#">Algo</a></li>
					</ul>
				</div>
			</div>

			<form class="form-horizontal" action="validarTipoCouch.php" method="POST" onsubmit=" return validarNuevoCouch(this)">
				<fieldset>
					
						<b>
							<h3>Agregar tipo de Couch</h3>
						</b>
						<div class="form-group">
							<label for="tipo">Nombre tipo de Couch</label>
							<input class="form-control" type="text" id="tipo" name="tipo" placeholder="Nombre del Couch nuevo">
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