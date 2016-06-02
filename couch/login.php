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
			<form class="form-horizontal" action="validar.php" method="POST" onsubmit=" return validarUsuario(this)">

				<fieldset>
					
					<b>
						<h3>Logueo</h3>
					</b>
					<div class="form-group">
						<label for="mail">E-mail:</label>
						<input class="form-control" type="text" id="mail" name="mail" placeholder="Ingrese su mail">
					</div>

					<div class="form-group">
						<label for="pass">Contraseña:</label>
						<input class="form-control" type="password" id="pass" name="pass" placeholder="Ingrese su contraseña">
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