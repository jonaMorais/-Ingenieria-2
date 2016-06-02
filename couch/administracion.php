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

		<main	>

			<h3>Administracion</h3>

			<div id="lateral" class="panel panel-success">
				<div class="panel-heading-custom">
					<h3 class="panel-title">Panel title</h3>
				</div>
				<div class="panel-body">
					<ul id="opciones">
						<li><a href="agregarTipo.php">Agregar tipo de couch</a></li>
						<li><a href="#">Listar tipos</a></li>
						<li><a href="#">Algo</a></li>
						<li><a href="#">Algo</a></li>
						<li><a href="#">Algo</a></li>
					</ul>
				</div>
			</div>

			
		</main>
		
		<blockquote>

			<footer>

				Grupo 16

			</footer>

		</blockquote>	

	</body>

</html>