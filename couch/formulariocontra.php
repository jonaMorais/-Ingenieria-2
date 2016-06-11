<!DOCTYPE html>

<html>

	<?php

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

		<main class="container">

			<form name="recuperarcontrase" class="form-horizontal" action="recuperarcontra.php" method="POST" onsubmit=" return validarClaveRecuperada()">

				<fieldset>
					
					<b>
						<h3>Recuperar Clave</h3>
					</b>
					<div class="form-group">
						<label for="mail">Ingresar su Email: </label>
						<input class="form-control" type="text" id="email" name="email" placeholder="Ingrese su email">
						<br>
						<button class="btn btn-color" type="button" onclick="location.href = 'index.php'">Volver</button>
						<input class="btn btn-color" type="submit"  value="Enviar"/>	
					</div>
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