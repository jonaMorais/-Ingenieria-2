<!DOCTYPE html>

<html>

	<?php

		require_once('sesion_class.php');
		$sesion= new sesion;
		$nom=$sesion->get();
		if($nom==false){
			?><script type="text/javascript">alert("Acceso denegado.");</script>
			<script type="text/javascript">window.location.replace("./index.php");</script>
			<?php
		}
		else{
			if($nom['roll']==null){
				?><script type="text/javascript">alert("Usted no es administrador.");</script>
				<script type="text/javascript">window.location.replace("./index.php");</script>
				<?php
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


			<div class="form-group">
				<form class="form-horizontal" action="actualizar_tipo.php" method="POST" onsubmit=" return validarTipo()">
					<label for="sel1">Tipos de couch:</label>
					<select class="form-control" id="Tipos" name="tipos">
						<option id="Tipo" value="0">------------------------</option>
						<?php
							require_once('ver_tipos.php');
							$tipos=ver_tipos();
							foreach($tipos as $t){
								echo "<option id=Tipo value=$t[0]>$t[1]</option>";
							}
						?>
					</select><br>
					<input class="btn btn-color" type="button" value="Volver" onclick="window.location.href='./administracion.php'">
					<input class="btn btn-color" type="submit" value="Modificar">
				</form>
			</div>

		</main>
		
		<blockquote>

			<footer>

				Grupo 16

			</footer>

		</blockquote>	

	</body>

</html>