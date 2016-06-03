<!DOCTYPE html>

<html>

	<?php

		require_once('sesion_class.php');
		$sesion= new sesion;

		//---Incluimos el head
		include_once('view/head.html');

	?>
	<script language="Javascript"> 
				function pregunta(){ 
					if (confirm('¿Estas seguro de activar el premium?')){ 
     					  document.recuperarcontrase.submit() 
   					 } 
				} 
		</script>
	<body class="container">

		<?php

			//---Incluimos el header
			include_once('view/header.html');

			//---Incluimos el nav
			include_once('view/navBar/navBar.php');

		?>

		<main class="container">

			<form name="recuperarcontrase" class="form-horizontal" action="recuperarcontra.php" method="POST" onsubmit=" return validarUsuario(this)">

				<fieldset>
					
					<b>
						<h3>Recuperar Clave</h3>
					</b>
					<div class="form-group">
						<label for="mail">Ingresar su Email: </label>
						<input class="form-control" type="email" id="email" name="email" placeholder="Ingrese su email" required>
						<br>
						<input class="btn btn-color" type="button" onclick="pregunta()" value="Enviar"/>
						<button class="btn btn-color" type="button" onclick="location.href = 'index.php'">Volver</button>	
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