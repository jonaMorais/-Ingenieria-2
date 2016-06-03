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
		$id=$_POST["tipos"];
		require_once('ver_tipo.php');
		$tipo=ver_tipo($id);
		
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
				<form class="form-horizontal" action="update_tipo.php" method="POST" onsubmit=" return validarTipo2()">
					<fieldset>
						<b>
							<h3>Modificar tipo de couch:</h3>
						</b>
						<div class="form-group">
							<input type="hidden" name="Tipo" id="tipo" value=<?php echo $id ?>>
							<label for="mail">Nombre:</label>
							<input class="form-control" type="text" id="nombre" name="nombre" value=<?php echo $tipo[1]?>>
						</div>
						<?php
							if($tipo[2]!=null){?>
								<div class="checkbox">
									<label><input type="checkbox" name="check" value="1" checked>Oculto</label>
								</div>
							<?php
							}
							else{?>
								<div class="checkbox">
									<label><input type="checkbox" name="check" value="0">Oculto</label>
								</div>
								<br>
							<?php
							}?>
						<input class="btn btn-color" type="button" value="Volver" onclick="history.back(-1)">
						<input class="btn btn-color" type="submit" value="Enviar">
					</fieldset>
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