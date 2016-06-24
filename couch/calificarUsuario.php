<?php
		require_once('sesion_class.php');
		$sesion= new sesion;
		if($sesion->get()==false){
			?><script type="text/javascript">alert("Acceso denegado.");</script><?php
			?><script type="text/javascript">window.location.replace("./index.php");</script><?php
		}
		//---Incluimos el head
		include_once('view/head.html');
	?>
	<!DOCTYPE html>

	<html>

		<body class="container">
			<?php
				//---Incluimos el header
				include_once('view/header.html');
				//---Incluimos el nav
				include_once('view/navBar/navBar.php');
			?>

			<main class="container">
			<?php
			//necesita el usuario Solicita y el id publicacion para para poder almacenar en la base esa informacion
			//se lo envio a cargoCalificarU.php en caso que no tenga esa informacion no podra mostrarse el formulario
			if(isset($_POST['usuarioSolicita']) & !empty($_POST['usuarioSolicita'])){
				
				//Controlar si ya se califico
					require_once('conexion.php');
					require_once('busqueda.php');
					$idUsuarioSolicita=$_POST['usuarioSolicita'];
					$idUsuario=$sesion->getIdUsuario();
					$enlace=conect();
					$consulta="SELECT * FROM calificacion WHERE(idUsuarioSolicita=".$idUsuarioSolicita.") and (idPublicacion=NULL) and (idusuarioPublica=".$idUsuario.")";
					$res=busqueda($consulta);
					if($res){
							?><script type="text/javascript">alert("El usuario ya fue calificado");</script>
					<script type="text/javascript">window.location.replace("./visualizarUsuariosCalificar.php");</script>
					<?php
					}else{

					?>
						<form class="form-horizontal" action="cargoCalificarU.php" method="POST" onsubmit=" return validarCalificarUsu()">
							<fieldset>
								<b>
									<h3>Calificacion del Usuario</h3>
								</b>
								<div class="form-group">
									<label for="puntuacion">Puntuacion de 1 al 10: </label>
									<input class="form-control" type="number" id="puntuacion" name="puntuacion" placeholder="Ingrese una puntuacion" >
								</div>
								<div class="form-group">
									<label for="Comentario">Comentario: (Opcional)</label>
									<textarea class="form-control" type="text" id="comentario" name="comentario">
									</textarea>
								</div>
								<input type="hidden" name="idpublicacion" id="idpublicacion" value=<?php echo $_POST['idpublicacion']; ?>>
								<input type="hidden" name="usuarioSolicita" id="usuarioSolicita" value=<?php echo $_POST['usuarioSolicita']; ?>>
								<button class="btn btn-color" type="button" onclick="location.href = 'visualizarUsuariosCalificar.php'">Volver</button>
								<input class="btn btn-color" type="submit" value="Calificar Usuario">
							</fieldset>
						</form>
					<?php
					}
			}else{
				?><script type="text/javascript">alert("No hay datos para calificar");</script>
					<script type="text/javascript">window.location.replace("./visualizarUsuariosCalificar.php");</script>
					<?php
			}
			?>
		</main>
			
		<blockquote >

			<footer>

				Grupo 16

			</footer>

		</blockquote>	

	</body>

</html>
